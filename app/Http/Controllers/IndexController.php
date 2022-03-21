<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    
    public function redirect() {
        if(Auth::id()){
//            return view('backend.pages.dashboard.index');
            return view('dashboard');
        }else{
            return redirect('/login');
        }
    }
    
    
    public function index() {
        return view('pages.dashboard.index');
    }
    
    
}
