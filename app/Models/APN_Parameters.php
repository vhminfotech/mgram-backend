<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class APN_Parameters extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'apn_parameter';
    
    public function AddApn($request) {
        $objApn = new APN_Parameters();
        $objApn->operator = $request->operator;
        $objApn->apn_name = $request->apn_name;
        $objApn->apn = $request->apn;
        $objApn->proxy = $request->proxy;
        $objApn->port = $request->port;
        $objApn->username = $request->username;
        $objApn->password = $request->password;
        $objApn->server = $request->input('server');
        $objApn->mmsc = $request->mmsc;
        $objApn->mms_proxy = $request->mms_proxy;
        $objApn->mms_port = $request->mms_port;
        $objApn->mcc = $request->mcc;
        $objApn->mnc = $request->mnc;
        $objApn->auth_type = $request->auth_type;
        $objApn->apn_protocol = $request->apn_protocol;
        $objApn->apn_type = $request->apn_type;
        $objApn->apn_roaming = $request->apn_roaming;
        $objApn->bearer = $request->bearer;
        $objApn->mvno_type = $request->mvno_type;
        $objApn->mvno_value = $request->mvno_value;
        $objApn->created_at = date("Y-m-d h:i:s");
        $objApn->updated_at = date("Y-m-d h:i:s");
        return $objApn->save();
    }
    
     public function updateApn($request, $id){
        $objApn = APN_Parameters::find($id);
        $objApn->operator = empty($request->operator) ? $objApn->operator : $request->operator;
        $objApn->apn_name = empty($request->apn_name) ? $objApn->apn_name : $request->apn_name;
        $objApn->apn = empty($request->apn) ? $objApn->apn : $request->apn;
        $objApn->proxy = empty($request->proxy) ? $objApn->proxy : $request->proxy;
        $objApn->port = empty($request->port) ? $objApn->port : $request->port;
        $objApn->username = empty($request->username) ? $objApn->username : $request->username;
        $objApn->password = empty($request->password) ? $objApn->password : $request->password;
        $objApn->server = empty($request->input('server')) ? $objApn->server : $request->input('server');
        $objApn->mmsc = empty($request->mmsc) ? $objApn->mmsc : $request->mmsc;
        $objApn->mms_proxy = empty($request->mms_proxy) ? $objApn->mms_proxy : $request->mms_proxy;
        $objApn->mms_port = empty($request->mms_port) ? $objApn->mms_port : $request->mms_port;
        $objApn->mcc = empty($request->mcc) ? $objApn->mcc : $request->mcc;
        $objApn->mnc = empty($request->mnc) ? $objApn->mnc : $request->mnc;
        $objApn->auth_type = empty($request->auth_type) ? $objApn->auth_type : $request->auth_type;
        $objApn->apn_protocol = empty($request->apn_protocol) ? $objApn->apn_protocol : $request->apn_protocol;
        $objApn->apn_type = empty($request->apn_type) ? $objApn->apn_type : $request->apn_type;
        $objApn->apn_roaming = empty($request->apn_roaming) ? $objApn->apn_roaming : $request->apn_roaming;
        $objApn->bearer = empty($request->bearer) ? $objApn->bearer : $request->bearer;
        $objApn->mvno_type = empty($request->mvno_type) ? $objApn->mvno_type : $request->mvno_type;
        $objApn->mvno_value = empty($request->mvno_value) ? $objApn->mvno_value : $request->mvno_value;
        $objApn->updated_at = date("Y-m-d h:i:s");
        return $objApn->save();
    }
    
}
