<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMeta;

class UserMetaController extends Controller
{
    public function updateUserMeta(Request $request) {
        $objUserMeta = new UserMeta();
        return $objUserMeta->updateUserMeta($request);
    }

    public function getUserMeta(Request $request) {
        $objUserMeta = new UserMeta();
        return $objUserMeta->getUserMeta($request);
    }
}
