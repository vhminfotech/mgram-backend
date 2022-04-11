<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UserMeta extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
    ];

    public function addUserMeta($request){
        $objUserMeta = UserMeta::create($request);
        return $objUserMeta ;
    }

    public function updateUserMeta($request){
        $userMetaCheck = DB::table('user_metas')->where('user_id', '=', auth('api')->user()->id)->get();
        $objUserMeta = UserMeta::find($userMetaCheck[0]->id);
        $objUserMeta->signature = empty($request->signature) ? $objUserMeta->signature : $request->signature;
        $objUserMeta->signature_value = empty($request->signature_value) ? $objUserMeta->signature_value : $request->signature_value;
        $objUserMeta->read_report = empty($request->read_report) ? $objUserMeta->read_report : $request->read_report;
        $objUserMeta->updated_at = date("Y-m-d h:i:s");
        $objUserMeta->save();
        return $objUserMeta;
    }

    public function getUserMeta() {

         $userMetaCheck = DB::table('user_metas')
                 ->where('user_id', '=', auth('api')->user()->id)->get();
         return $userMetaCheck;
    }
}
