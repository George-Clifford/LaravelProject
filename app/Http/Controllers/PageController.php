<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function users()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function settings()
    {
        return view('settings');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/Login');
    }
}
