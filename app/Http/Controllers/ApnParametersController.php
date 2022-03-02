<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\APN_Parameters;

class ApnParametersController extends Controller
{
    public function index(){
        return APN_Parameters::all();
    }
    
    public function show($id){
        return APN_Parameters::find($id);
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
