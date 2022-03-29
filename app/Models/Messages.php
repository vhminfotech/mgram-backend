<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Messages extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function createMessages($request, $thread_id) {
        
        $objMessages = new Messages();
        $objMessages->thread_id = $thread_id;
        $objMessages->sender_id = auth('api')->user()->id;
        $objMessages->text = $request->text ? $request->text : '';
        $objMessages->is_attachment = $request->attachment_id ? 1 : 0;
        $objMessages->attachment_id = $request->attachment_id ? $request->attachment_id : NULL;
        $objMessages->sent_date = date("Y-m-d h:i:s");
        $objMessages->save();
        return $objMessages;
    }
    
    public function getMessages($thread_id) {
        $data = DB::table('messages')
                ->select('messages.*', 'messages.id as msg_id', 'attachments.*' )
                ->leftJoin('attachments', 'attachments.id', '=', 'messages.attachment_id')
                ->orderBy('sent_date', 'asc')
                ->where('messages.thread_id', '=', $thread_id)
                ->get();

        foreach ($data as $msg){
            $response[] = array(
                'id' => $msg->msg_id,
                'thread_id' => $msg->thread_id,
                'sender_id' => $msg->sender_id,
                'message' => $msg->text,
                'date_sent' => $msg->sent_date,
                'is_attachment' => $msg->is_attachment === 1 ? true : false,
                'attachment_id' => $msg->attachment_id,
                'url' => $msg->is_attachment === 1 ?  url('/') . $msg->url : false,
            );
        }
        
        return $response;
    }
    
    public function getLastSender($thread_id){
        $data = DB::table('messages')
                ->select('sender_id')
                ->orderBy('sent_date', 'desc')->where('thread_id', '=', $thread_id)->first();
        return $data->sender_id;
    }
    
    public function getLastMessage($thread_id){
        $data = DB::table('messages')
                ->select('text')
                ->orderBy('sent_date', 'desc')->where('thread_id', '=', $thread_id)->first();
        return $data->text;
    }
    
    public function getLastMessageSentDate($thread_id){
        $data = DB::table('messages')
                ->select('sent_date')
                ->orderBy('sent_date', 'desc')->where('thread_id', '=', $thread_id)->first();
        return $data->sent_date;
    }
    
}