<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use DB;

class UserController extends Controller
{
    
    public function index() {
        $user_data = User::join('operators', 'operators.id', '=', 'users.operator')
                ->get(['users.*', 'operators.operator_name']);
        $user_data = $user_data->all();
        $data = compact('user_data');
        return view('pages.users.index')->with($data);
    }
    
    public function Registration(Request $request){
        $request->validate([
            'name' => 'required',
            'operator' => 'required',
            'MSISDN' => 'required|integer',
        ]);
        
        $userCheck = DB::table('users')
             ->where('MSISDN', '=', $request->MSISDN)
             ->get();
        
        if($userCheck->isEmpty()){
            
            $User= User::create([
                'name' =>$request->name,
                'operator'=>$request->operator,
                'MSISDN'=>$request->MSISDN,
            ]);
            
            $objUserMeta = new UserMeta();
            $result = $objUserMeta->addUserMeta([
                'user_id' => $User->id
            ]);

            $access_token = $User->createToken('tokens')->accessToken;
            
            return response()->json([
                    'status' => 1, 
                    "user_id" => $User->id,
                    "user_data" => null,
                    "token" => $access_token,
                    "message" => "User Registred Successfully"
                ], 200);
            
        }else{
            
            $User = User::find($userCheck[0]->id);
            $access_token = $User->createToken('tokens')->accessToken;
            
            //now return this token on success login attempt
            return response()->json([
                    'status' => 1, 
                    "user_id" => $userCheck[0]->id,
                    "user_data" => $userCheck,
                    "token" => $access_token,
                    "message" => "User Login Successfully"
                    ], 200); die();
        }
    }
    
    public function deleteUsers() {
        $users = DB::table('users')->truncate();
            return "User Table Turncated Successfully";
    }
}
