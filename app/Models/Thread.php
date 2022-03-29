<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Thread;
use App\Models\ThreadParticipants;
use DB;

class Thread extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function createThread($request) {
        if(count($request->user_id) <= 2){
            $arr = array_values($request->user_id);
            
            $data = DB::table('thread_participants')
                    ->select('thread_participants.*')
                    ->join('threads', 'threads.id', '=', 'thread_participants.thread_id')
                    ->where('threads.thread_type', '=', 'personal')
                    ->whereIn('thread_participants.user_id', [$arr[0], $arr[1]])
                    ->get();
            
            if(count($data) === 2 ){
                return array('thread' => 'old' , 'thread_id' => $data[0]->thread_id);
            }else{
                return array('thread' => 'new' , 'thread_id' => $this->createNewThread($request));
            }
        }else{
            return array('thread' => 'new' , 'thread_id' => $this->createNewThread($request));
        }
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
                    ->where('id', '=', $thread_id)->get();
        return $data[0]->thread_type === 'room' ? true : false;
    }
    
    public function getGroupName($thread_id) {
        $data = DB::table('threads')
                    ->select('name')
                    ->where('id', '=', $thread_id)->get();
        return $data[0]->name;
    }
    
    public function getGroupAvatar($thread_id) {
        $data = DB::table('threads')
                    ->select('avatar')
                    ->where('id', '=', $thread_id)->get();
        return $data[0]->avatar;
    }
}
