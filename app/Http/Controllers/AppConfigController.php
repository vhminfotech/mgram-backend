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
        
        $data['header'] = array(
            'breadcrumb' => array(
                'Dashboard' => route("dashboard"),
                'App Settings' => 'App Settings'));
        
        return view('pages.settings.settingIndex')->with($data);
    }
    
    public function ConfigIndex($id){
        $appConf = AppConfig::where('operator', '=', $id)->first();
        if($appConf === NULL){
            $appConf = new AppConfig();
            $appConf->createAppConfig($id);
        }
        
        $settingData = AppConfig::where('operator', '=', $id)->get();
        
        $data = compact('settingData');
        
        $data['header'] = array(
            'breadcrumb' => array(
                'Dashboard' => route("dashboard"),
                'App Settings' => url("settings"),
                'Configuration List' =>  'Configuration List'));
        return view('pages.settings.configIndex')->with($data);
    }
    
    public function editSettingForm($id) {
        $settingData = AppConfig::find($id);
        
        $data['header'] = array(
            'breadcrumb' => array(
                'Dashboard' => route("dashboard"),
                'App Settings' => url("settings"),
                'App Settings' => 'App Settings'));
        
        $data = compact('settingData');
        $data['header'] = array(
            'breadcrumb' => array(
                'Dashboard' => route("dashboard"),
                'App Settings' => url("settings"),
                'Configuration List' => url("configIndex", $settingData->operator),
                'Edit Configuration' => 'Edit Configuration'));
        
        return view('pages.settings.edit')->with($data);
    }
    
    public function editSetting(Request $request, $id) {
        $objAppConf = new AppConfig();
        $objAppConf->updateAppConfig($request, $id);
        return redirect()->back();
    }
    
    public function index($operator_id){
        $appConfig = AppConfig::select('config_name', 'config_value')
                ->where('operator','=',$operator_id)->get();
        
        if($appConfig->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            foreach($appConfig as $value){
                if($value->config_name === 'apk' ){
                    if($value->config_value !== ''){
                        $data[] = [ 'config_name' => $value->config_name, 'config_value' =>  url('/') . $value->config_value];
                    }else{
                        $data[] = [ 'config_name' => $value->config_name, 'config_value' =>  ''];
                    }
                }else{
                    $data[] = [ 'config_name' => $value->config_name, 'config_value' =>  $value->config_value];
                }
            }
            return $data;
        }
    }
    
    public function show(Request $request){
        
         $request->validate([
            'config_name' => 'required',
            'operator' => 'required',
        ]);
         
//        if($request->config_name !== null && $request->operator){
            $app_config = DB::table('app_config')
                    ->where('config_name', '=', $request->config_name)
                    ->where('operator', '=', $request->operator)
                    ->get();
        
            if($app_config->isEmpty()){
                return array('status'=> 0 , 'message' => 'No Data Found' );
            }else{
                foreach($app_config as $value){
                if($value->config_name === 'apk'){
                    if($value->config_value !== ''){
                        $data[] = [ 'config_name' => $value->config_name, 'config_value' =>  url('/') . $value->config_value];
                    }else{
                        $data[] = [ 'config_name' => $value->config_name, 'config_value' =>  ''];
                    }
                }else{
                    $data[] = [ 'config_name' => $value->config_name, 'config_value' =>  $value->config_value];
                }
            }
            return $data;
        }
    }
}
