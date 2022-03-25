<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    public function storeAttachment(Request $request) {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'file_type' => 'required',
        ]);
        
        $fileName = 'op_' .time().'.'.$request->file->extension();  
        $request->file->move(public_path('images/attachments/'  .date("Y") . '/' . date("m") . '/'), $fileName);
        $file_path = '/images/attachments/' .date("Y") . '/' . date("m") . '/' . $fileName;
        
        $objAttachment = new Attachment();
        $objAttachment->url = $file_path;
        $objAttachment->file_type = $request->file_type;
        $objAttachment->created_at = date("Y-m-d h:i:s");
        
        if($objAttachment->save()){
            $data = array(
                'attachment_id' => $objAttachment->id,
                'attachment_url' => url('/') . $objAttachment->url,
                'file_type' => $objAttachment->file_type,
                'created_at' => $objAttachment->created_at,
            );
            return $data;
        }
    }
    
    public function getAttachment($id) {
        $objAttachment = Attachment::find($id);
        if($objAttachment !== NULL){
            $data = array(
                'attachment_id' => $objAttachment->id,
                'attachment_url' => url('/') . $objAttachment->url,
                'file_type' => $objAttachment->file_type,
                'created_at' => $objAttachment->created_at,
            );
            return $data;
        }else{
            $data = array(
                'message' => 'no image found',
            );
            return $data;
        }
    }
}
