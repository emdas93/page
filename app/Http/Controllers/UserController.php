<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Models\User;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\LoginRequest;

class UserController extends Controller
{
    // use AuthendicatesUsers;

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

    public function infoView(Request $request)
    {
        $data = [];
        $data['userData'] = User::getUserInfo(Auth::user()->id);
        return view('user.info', $data);
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'user_email' => $request->user_email,
            'password' => $request->user_password,
        ];
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return redirect()->back();
    }

    public function register(RegisterRequest $request)
    {
        if (User::registerUser($request))
        {
            return redirect('/');
        }
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    

}
