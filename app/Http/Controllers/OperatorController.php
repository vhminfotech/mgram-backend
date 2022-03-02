<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operators;

class OperatorController extends Controller
{
    public function index(){
        $operators = Operators::all();
        
        if($operators->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $operators;
        }
    }
    
    public function show($id){
        $operators = Operators::find($id);
         
        if(!isset($operators) || is_null($operators)){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $operators;
        }
    }
    
    public function store(Request $request){
        return Operators::create($request->all());
    }
    
    public function update(Request $request, $id) {
        $operators = Operators::findOrFail($id);
        $operators->update($request->all());

        return $operators;
    }
    
//    public function delete(Request $request, $id)
//    {
//        $operators = Article::findOrFail($id);
//        $operators->delete();
//
//        return 204;
//    }
    
}
