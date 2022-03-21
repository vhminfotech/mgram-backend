<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMeta;

class UserMetaController extends Controller
{
    public function updateUserMeta(Request $request) {
        $objUserMeta = new UserMeta();
        $result = $objUserMeta->updateUserMeta($request);
        return $result;
    }
    
    public function getUserMeta(Request $request) {
        $objUserMeta = new UserMeta();
        $result = $objUserMeta->getUserMeta($request);
        return $result;
    }
}
