<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppConfig;
use DB;

class AppConfigController extends Controller
{
    public function index(){
        $appConfig = AppConfig::all();
        
        if($appConfig->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $appConfig;
        }
    }
    
    public function show(Request $request){
        if($request->config_name !== null){
                    

            $app_config = DB::table('app_config')
             ->where('config_name', '=', $request->config_name)
             ->get();
        
            if($app_config->isEmpty()){
                return array('status'=> 0 , 'message' => 'No Data Found' );
            }else{
                return $app_config;
            }

        }else {
            return "config_name is required field";
        }

    }
}
