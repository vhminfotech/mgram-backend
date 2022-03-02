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
    
//    public function delete(Request $request, $id)
//    {
//        $ApnParam = APN_Parameters::findOrFail($id);
//        $ApnParam->delete();
//
//        return 204;
//    }
}
