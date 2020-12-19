<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlappenController extends Controller
{
    
    public function index() {
        return view('flappen.index');
    }

    public function postAuth(Request $request) {
        $nickname = $request->nickname;
        $name = $request->name;
        $email = $request->email;
        $passwd = $request->passwd;
        $type = $request->type;

    }

}
