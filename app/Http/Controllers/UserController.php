<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Requests\User\RegisterRequest;

class UserController extends Controller
{
    /**
     * 작성일자 : 2023-09-08
	 * 작성자 : 추승협
     * 기능 : 유저 로그인 페이지 로드
     */
    public function loginView()
    {
        return view('user.login');
    } 

    public function registerView()
    {
        return view('user.register');
    } 

    public function login(Request $request)
    {
        
    }

    public function register(RegisterRequest $request)
    {
        User::registerUser($request);
    }

}
