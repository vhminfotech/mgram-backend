<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\ThreadParticipants;
use App\Models\Messages;
use DB;

class MessagesController extends Controller
{
    public function composeMessage(Request $request) {
        
        $request->validate([
            'user_id' => 'required', //array
        ]);
        
        if(count($request->user_id) === 2 ){
            $request->validate([
                'text' => 'required'
            ]);
        }
        
        $objThread = new Thread();
        $thread = $objThread->createThread($request);
        
        if($thread['thread'] === 'new'){
            foreach($request->user_id as $user_id){
                $objThreadParticipants = new ThreadParticipants();
                $objThreadParticipants->createThreadParticipants($request, $thread['thread_id'], $user_id);
            }
            if(count($request->user_id) > 2 ){
                return $this->msgRespose($thread['thread_id']);
            }else {
                $objMessages = new Messages();
                $response = $objMessages->createMessages($request, $thread['thread_id']);
                return $this->msgRespose($thread['thread_id']);
            }
        }else {
            return $this->msgRespose($thread['thread_id']);
        }
    }
    
    public function msgRespose($thread_id){

        $objMessages = new Messages();
          $lastSender = $objMessages->getLastSender($thread_id);
          $message = $objMessages->getLastMessage($thread_id);
          $date = $objMessages->getLastMessageSentDate($thread_id);
          $messages = $objMessages->getMessages($thread_id);
                  
          $objTP = new ThreadParticipants();
          $recipients_ids = $objTP->getRecipientsIds($thread_id);
          $recipients_count = $objTP->getRecipientsCount($thread_id);
          
          $objThread = new Thread();
          $is_group = $objThread->checkIsGroup($thread_id);
          $group_name = $objThread->getGroupName($thread_id);
          $group_avatar = $objThread->getGroupAvatar($thread_id);
          
          $data = array(
              'id' => $thread_id,
              'last_sender_id' => $lastSender,
              'message' => $message,
              'date' => $date,
              'unread_count' => 0,
              'recipients_ids' => $recipients_ids,
              'current_user' => auth('api')->user()->id,
              'is_group' => $is_group,
              'group_name' => $group_name,
              'group_avatar' => $group_avatar,
              'recipients_count' => $recipients_count,
              'messages' => $messages
          );
          
          return $data;
    }
}
