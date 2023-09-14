<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
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
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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
        $user_password = Crypt::encrypt($request->user_password);

        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_password = $user_password;
        $user->user_grade = 1;

        $user->save();

        // User::create([
        //     'user_name' => $request->user_name,
        //     'user_email' => $request->user_email,
        //     'user_password' => $request->user_password
        // ]);
    }
}
