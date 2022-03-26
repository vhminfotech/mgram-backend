<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function createThread($request) {
        $objThread = new Thread();
        $objThread->thread_type = count($request->user_id) > 2  ? 'room' : 'personal';
        $objThread->last_sent_date = date("Y-m-d h:i:s");
        $objThread->created_at = date("Y-m-d h:i:s");
        $objThread->save();
        return $objThread->id;
    }
}
