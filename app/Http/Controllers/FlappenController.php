<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlappenController extends Controller
{
    
    public function index() {
        return view('flappen.index');
    }


}
