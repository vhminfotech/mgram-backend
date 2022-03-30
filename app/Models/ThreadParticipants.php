<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ThreadParticipants extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function createThreadParticipants($request, $thread_id, $user_id) {
        
        $objThreadParticipants = new ThreadParticipants();
        $objThreadParticipants->user_id = $user_id;
        $objThreadParticipants->thread_id = $thread_id;
        $objThreadParticipants->unread_count = 1;
        $objThreadParticipants->is_deleted = 0;
        $objThreadParticipants->is_block = 0;
        
        if(count($request->user_id) === 2 ){
            $objThreadParticipants->is_admin = auth('api')->user()->id == $user_id ? 1 : 0;
        }else{
            $objThreadParticipants->is_admin = 0;
        }
        
        $objThreadParticipants->is_mute = 'none';
        $objThreadParticipants->last_sent_date = date("Y-m-d h:i:s");
        $objThreadParticipants->save();
        return $objThreadParticipants;
    }
    
    public function setReadCount($thread_id){
        $objTP = ThreadParticipants::where('thread_id', '=', $thread_id)->get();
        foreach($objTP as $row){
            $obj = ThreadParticipants::find($row->id); 
            $obj->unread_count = $obj->unread_count + 1; 
            $obj->save(); 
        }
    }
    
    public function getReadCount($thread_id){
        $data = DB::table('thread_participants')
                ->select('unread_count')
                ->where('thread_id', '=', $thread_id)
                ->where('user_id', '=', auth('api')->user()->id)
                ->first();
        return $data->unread_count;
    }
    
    public function getRecipientsIds($thread_id){
       $data = DB::table('thread_participants')
                ->select('user_id')
                ->where('thread_id', '=', $thread_id)->get();
       
       foreach ($data as $id){
           $user_ids[] = $id->user_id;
       }
       return $user_ids;
    }
    
    public function updateThreadParticipantLateDateSent($thread_id) {
        $objTP = ThreadParticipants::where(['thread_id', '=', $thread_id], ['user_id', '=', auth('api')->user()->id]);
        $objTP->last_sent_date = date("Y-m-d h:i:s");
        return $objTP->save();
    }
    
    public function getRecipientsCount($thread_id){
       $data = DB::table('thread_participants')
                ->select('user_id')
                ->where('thread_id', '=', $thread_id)->get();
        return count($data);
    }
    
}
