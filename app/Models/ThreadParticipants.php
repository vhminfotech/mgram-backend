<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadParticipants extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function createThreadParticipants($request, $thread_id, $user_id) {
        
        $objThreadParticipants = new ThreadParticipants();
        $objThreadParticipants->user_id = $user_id;
        $objThreadParticipants->thread_id = $thread_id;
        $objThreadParticipants->unread_count = 0;
        $objThreadParticipants->is_deleted = 0;
        $objThreadParticipants->is_block = 0;
        $objThreadParticipants->is_admin = auth('api')->user()->id == $user_id ? 1 : 0;
        $objThreadParticipants->is_mute = 'none';
        $objThreadParticipants->last_sent_date = date("Y-m-d h:i:s");
        $objThreadParticipants->save();
        return $objThreadParticipants;
    }
}
