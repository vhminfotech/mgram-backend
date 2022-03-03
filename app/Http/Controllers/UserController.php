<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function Registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'operator' => 'required',
            'MSISDN' => 'required|integer',
        ]);
        
        $userCheck = DB::table('users')
             ->where('MSISDN', '=', $request->MSISDN)
             ->get();
        
        if($userCheck->isEmpty()){
            $objUser = new User();
            $objUser->name = $request->name;
            $objUser->operator = $request->operator;
            $objUser->MSISDN = $request->MSISDN;
            $objUser->created_at = date("Y-m-d h:i:s");
            $objUser->updated_at = date("Y-m-d h:i:s");
            $lastInsId = $objUser->save();

            if($lastInsId){
                return array(
                    'status' => 1, 
                    "user_id" => $objUser->id,
                    "user_data" => null,
                    "message" => "User Registred Successfully"
                );
            }
        }else{
            return array(
                    'status' => 1, 
                    "user_id" => $userCheck[0]->id,
                    "user_data" => $userCheck,
                    "message" => "User Login Successfully"
                );
        }
    }
    
    public function deleteUsers() {
        $users = DB::table('users')->truncate();
            return "User Table Turncated Successfully";
    }
}
