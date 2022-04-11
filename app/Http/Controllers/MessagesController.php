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
                'text' => 'required_without:attachment_id',
                'attachment_id' => 'required_without:text',
            ]);
        }

        $objThread = new Thread();
        $thread = $objThread->createThread($request);

        $objMsg = new Messages();

        if($thread['thread'] === 'new'){
            foreach($request->user_id as $user_id){
                $objThreadParticipants = new ThreadParticipants();
                $objThreadParticipants->createThreadParticipants($request, $thread['thread_id'], $user_id);
            }

            if(count($request->user_id) > 2 ){
                // if thread is one to many // Group
                return array('status' => 1 , 'message' => 'group thread created');
            }else {
                // If thread is one to one // personal
                $objMsg->createMessages($request, $thread['thread_id']);
                return $objMsg->msgRespose($thread['thread_id']);
            }
        }else {
            //if thread is already exist
            return $objMsg->msgRespose($thread['thread_id']);
        }
    }

    public function createMessage(Request $request, $thread_id) {
        $request->validate([
            'text' => 'required_without:attachment_id',
            'attachment_id' => 'required_without:text',
        ]);
        $objMsg = new Messages();
        $objMsg->createMessages($request, $thread_id);

        return $objMsg->msgRespose($thread_id);
    }

    public function getMessageRespose($thread_id){
        $objMsg = new Messages();
        return $objMsg->msgRespose($thread_id);
    }

    public function getAllThreads(){
        $objThread = new Thread();
        return $objThread->getAllThreads();
    }

    public function markThread(Request $request, $thread_id) {
        $request->validate([
            'action' => 'required',
        ]);

        $objTP = new ThreadParticipants();
        return $objTP->updateReadCount($request, $thread_id);
    }
}
