<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\RegisterRequest;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'user_email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerUser(RegisterRequest $request) {
        $user = new User();

        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_password = Hash::make($request->user_password);
        $user->user_grade = 1;
        $user->user_picture_path = 'path';

        $user->save();

        // User::create([
        //     'user_name' => $request->user_name,
        //     'user_email' => $request->user_email,
        //     'user_password' => $request->user_password
        // ]);
    }

    public function getUserInfo($userId) {
        $user = new User();
        $user->id = $userId;
        return $user->get();
    }



    public function getAuthPassword()
    {
        return $this->user_password;
    }

    // public function getEmailAttribute()
    // {
    //     return $this->user_email;
    // }

    // public function validateCredentials(array $credentials)
    // {
    //     $plain = $credentials['password'];
    //     return $this->hasher->check($plain, $this->getAuthPassword());
    // }

    // public function username() {
    //     return "user_email";
    // }
}
