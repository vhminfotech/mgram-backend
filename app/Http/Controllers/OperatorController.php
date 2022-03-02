<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operators;

class OperatorController extends Controller
{
    public function index(){
        return Operators::all();
    }
    
    public function show($id){
        return Operators::find($id);
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
