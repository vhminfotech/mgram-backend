<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function createMessages($request, $thread_id) {
        
        $objMessages = new ThreadParticipants();
        $objMessages->thread_id = $thread_id;
        $objMessages->sender_id = auth('api')->user()->id;
        $objMessages->text = $request->text ? $request->text : '';
        $objMessages->is_attachment = $request->attachment_id ? 1 : 0;
        $objMessages->attachment_id = $request->attachment_id ? $request->attachment_id : '';
        $objMessages->sent_date = date("Y-m-d h:i:s");
        $objMessages->save();
        return $objMessages;
    }
}
