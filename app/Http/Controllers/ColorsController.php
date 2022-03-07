<?php

namespace App\Http\Controllers;
use App\Models\Colors;
use Illuminate\Http\Request;
use DB;

class ColorsController extends Controller
{
    public function index(){
        $colors = Colors::all();
        
        if($colors->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $colors;
        }
    }
    
    public function show($id){
        $color = DB::table('colors')
             ->where('operator_id', '=', $id)
             ->get();
        
        if($color->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $color;
        }
    }
}
