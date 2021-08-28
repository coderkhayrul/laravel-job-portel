<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerRegisterController extends Controller
{
    public function employerRegister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => Str::slug(request('cname'), '-'),

        ]);

        return redirect()->to('login');
    }
}
