<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoonController extends Controller
{
    public function index(Request $request) {
        return view('moon.index');
    }
}
