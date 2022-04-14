<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class IndexController extends Controller
{

    public function redirect() {
        if(Auth::id()){
            return redirect('/dashboard');
        }else{
            return redirect('/login');
        }
    }

    public function index() {
        $users = User::select(DB::raw('DATE_FORMAT(created_at, "%m") as month, count(id) as total'))
            ->whereBetween('created_at', ['2022-01-01 00:00:00', '2022-12-31 23:59:59'])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->all();

        $monthly_users_arr = array_replace(
            array(
                '01'=> 0,'02'=> 0,'03'=> 0,'04'=> 0,'05'=> 0,'06'=> 0,'07'=> 0,'08'=> 0,'09'=> 0,'10'=> 0,'11'=> 0,'12'=> 0
            ), $users);

        foreach ($monthly_users_arr as $user_count){
            $monthly_users[] = $user_count;
        }

        $data = compact('monthly_users');

        $data['header'] = array('breadcrumb' => array('Dashboard' => 'Dashboard'));
        return view('pages.dashboard.index')->with($data);
    }


}
