<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SanctumController extends Controller
{
    public function AuthSanctum(User $user)
    {
        $credentials = [
        'email' => "admin@admin.com",
        'password' => "password"
        ];

        if(!Auth::attempt($credentials))
        {
            $newUser = new $user();
            $newUser->name = 'admin';
            $newUser->email = $credentials['email'];
            $newUser->password = Hash::make($credentials['password']);
            $newUser->save();
        }
        if(Auth::attempt($credentials))
        {
            $olduser = Auth::user();
            $adminToken = $olduser->createToken('admin-token', ['create', 'update', 'delete']);
            $userToken = $olduser->createToken('user-token');
            return [
                'admin' => $adminToken->plainTextToken,
                'user' => $userToken->plainTextToken,
            ];
        }
    }
}
