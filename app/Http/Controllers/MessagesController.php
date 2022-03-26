<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\ThreadParticipants;
use App\Models\Messages;

class MessagesController extends Controller
{
    public function composeMessage(Request $request) {
        
        $request->validate([
            'user_id' => 'required', //array
        ]);
        
        $objThread = new Thread();
        $thread_id = $objThread->createThread($request);

        foreach($request->user_id as $user_id){
            $objThreadParticipants = new ThreadParticipants();
            $objThreadParticipants->createThreadParticipants($request, $thread_id, $user_id);
        }
        
//        $objMessages = new Messages();
//        $objMessages->createMessages($request, $thread_id);
        
        return $result;
    }
}
