<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\APN_Parameters;

class ApnParametersController extends Controller
{
    public function index(){
        $ApnParam = APN_Parameters::all();
        
        if($ApnParam->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $ApnParam;
        }
    }
    
    public function show($id){
        $ApnParam = APN_Parameters::find($id);
        if(!isset($ApnParam) || is_null($ApnParam)){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $ApnParam;
        }
    }
    
    public function store(Request $request){
        return APN_Parameters::create($request->all());
    }
    
    public function update(Request $request, $id) {
        $ApnParam= APN_Parameters::findOrFail($id);
        $ApnParam->update($request->all());

        return $ApnParam;
    }
    
    public function ApnListIndex() {
        $apn_data = APN_Parameters::join('operators', 'operators.id', '=', 'apn_parameter.operator')
                ->get(['apn_parameter.*', 'operators.operator_name']);
        $apn_data = $apn_data->all();
        $data = compact('apn_data');
        return view('pages.apn.index')->with($data);
    }
    
    public function editApnForm() {
        return view('pages.apn.edit');
    }
    
    public function editApn(Request $request) {
        print_r($request->all()); die();
    }
    
    
    
    
//    public function delete(Request $request, $id)
//    {
//        $ApnParam = APN_Parameters::findOrFail($id);
//        $ApnParam->delete();
//
//        return 204;
//    }
}
