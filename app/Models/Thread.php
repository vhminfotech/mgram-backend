<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Thread extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function createThread($request) {
        if(count($request->user_id) <= 2){
            $arr = array_values($request->user_id);

            $data = DB::table('thread_participants')
                ->select(DB::raw('thread_participants.thread_id, COUNT(thread_participants.thread_id) AS NumOccurrences'))
                ->join('threads', 'threads.id', '=', 'thread_participants.thread_id')
                ->where('threads.thread_type', '=', 'personal')
                ->whereIn('thread_participants.user_id', [$arr[0], $arr[1]])
                ->groupBy('thread_participants.thread_id')
                ->having(DB::raw('count(thread_participants.thread_id)'), '>', 1)
                ->first();
                
                if(!is_null($data)){
                    $data = get_object_vars($data);
                    
                    if($data['NumOccurrences'] === 2 ){
                        return array('thread' => 'old' , 'thread_id' => $data['thread_id']);
                    }
                    else{
                        return array('thread' => 'new' , 'thread_id' => $this->createNewThread($request));
                    }
                    
                }
                
                return array('thread' => 'new' , 'thread_id' => $this->createNewThread($request));
            
        }else{
            return array('thread' => 'new' , 'thread_id' => $this->createNewThread($request));
        }
    }

     public function getAllThreads() {
        $data = DB::table('threads')
                ->select('threads.*')
                ->leftJoin('thread_participants', 'thread_participants.thread_id', '=', 'threads.id')
                ->orderBy('threads.last_sent_date', 'desc')
                ->where('thread_participants.user_id', '=', auth('api')->user()->id)
                ->get();

        if ($data->isEmpty()){
            $respose = [ 'status' => '1', 'message' => 'No record found'];
        }

        foreach($data as $value){
            $respose[] = $this->threadResponse($value->id);
        }
        return $respose;
    }

    public function GetRecipientUser($data){
        if (in_array(auth('api')->user()->id, $data)){
            unset($data[array_search(auth('api')->user()->id,$data)]);
        }
//        foreach ($data as $val){
//            $array[] = $val;
//        }
        return $data;
    }

    public function threadResponse($thread_id) {
        $objTP = new ThreadParticipants();
        $objMsg = new Messages();

        return array(
            'id' => $thread_id,
            'last_sender_id' => $objMsg->getLastSender($thread_id),
            'message' => $objMsg->getLastMessage($thread_id),
            'date' => $objMsg->getLastMessageSentDate($thread_id),
            'unread_count' => 0,
            'recipients_ids' => $objTP->getRecipientsIds($thread_id),
            'current_user' => auth('api')->user()->id,
            'recipient_user' => $this->getUsers($this->GetRecipientUser($objTP->getRecipientsIds($thread_id))),
            'is_group' => $this->checkIsGroup($thread_id),
            'group_name' => $this->getGroupName($thread_id),
            'group_avatar' => $this->getGroupAvatar($thread_id),
            'recipients_count' => $objTP->getRecipientsCount($thread_id),
        );
    }

    public function getUsers($user_ids){
        foreach ($user_ids as $user_id){
            $objUser = User::find($user_id);
            $arr[] = [
                'id' => $objUser->id,
                'name' => $objUser->name,
                'operator' => $objUser->operator,
                'MSISDN' => $objUser->MSISDN,
                'chat_feature' => $objUser->chat_feature,
                'user_status' => $objUser->user_status,
            ];
        }
        return $arr;
    }

    public function updateThreadLateDateSent($thread_id) {
        $objThread = Thread::find($thread_id);
        $objThread->last_sent_date = date("Y-m-d h:i:s");
        return $objThread->save();
    }

    public function createNewThread($request) {
        $objThread = new Thread();
        $objThread->thread_type = count($request->user_id) > 2  ? 'room' : 'personal';
        $objThread->last_sent_date = date("Y-m-d h:i:s");
        $objThread->created_at = date("Y-m-d h:i:s");
        $objThread->save();
        return $objThread->id;
    }

    public function checkIsGroup($thread_id) {
        $data = DB::table('threads')
                    ->select('thread_type')
                    ->where('id', '=', $thread_id)->first();
        return $data->thread_type === 'room';
    }

    public function getGroupName($thread_id) {
        $data = DB::table('threads')
                    ->select('name')
                    ->where('id', '=', $thread_id)->first();
        return $data->name;
    }

    public function getGroupAvatar($thread_id) {
        $data = DB::table('threads')
                    ->select('avatar')
                    ->where('id', '=', $thread_id)->first();
        return $data->avatar;
    }
}
