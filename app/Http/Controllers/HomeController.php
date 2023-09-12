<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 작성일자 : 2023-09-08
	 * 작성자 : 추승협
     * 기능 : Home 로드
     */
    public function index() {
        return view('index');
    }
}
