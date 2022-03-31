<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppConfig;
use App\Models\Operators;
use DB;

class AppConfigController extends Controller {
    
    public function SettingList() {
        
        
        $operator_data = Operators::all();
        
        $data = compact('operator_data');
        return view('pages.settings.settingIndex')->with($data);
    }
    
    public function ConfigIndex($id){
        
        $settingData = AppConfig::where('operator', '=', $id)->get();
        
        $data = compact('settingData');
        return view('pages.settings.configIndex')->with($data);
    }
    
    public function editSettingForm($id) {
        $settingData = AppConfig::find($id);
        
        $data = compact('settingData');
        return view('pages.settings.edit')->with($data);
    }
    
    public function editSetting(Request $request, $id) {
        $objAppConf = new AppConfig();
        $objAppConf->updateAppConfig($request, $id);
        return redirect()->back();
    }
    
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
