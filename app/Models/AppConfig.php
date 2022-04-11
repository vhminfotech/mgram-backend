<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
    use HasFactory;

    protected $table = 'app_config';

     public function updateAppConfig($request) {
        $objAppConfig = AppConfig::find($request->id);

        if($objAppConfig->config_name === 'apk'){

            if ($request->file()) {
                $apkName = 'op_' .time(). $request->apk->getClientOriginalName();
                $request->apk->move(public_path('files/apk'), $apkName);
                $apkPath = '/files/apk/' . $apkName;
                $objAppConfig->config_value = $apkPath;
                return $objAppConfig->save();
            }
        }else{
            $objAppConfig->config_value = $request->config_value;
            $objAppConfig->updated_at = date("Y-m-d h:i:s");
            return $objAppConfig->save();
        }
    }

    public function createAppConfig($operator_id) {
        $field_arr = ['versionCode', 'versionName', 'apk'];
        foreach($field_arr as $value){
            $objAppConfig = new AppConfig();
            $objAppConfig->config_name = $value;
            $objAppConfig->config_value = '';
            $objAppConfig->operator = $operator_id;
            $objAppConfig->created_at = date("Y-m-d h:i:s");
            $objAppConfig->updated_at = date("Y-m-d h:i:s");
            $objAppConfig->save();
        }
    }
}
