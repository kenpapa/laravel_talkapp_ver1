<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
  public function getLogin()
  {
    return view('sessions.login');
  }

  public function postLogin(Request $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->route('posts.index');
    }
    return view('sessions.login');
  }

  public function getLogout()
  {
    Auth::logout();
    return redirect()->route('home');
  }
}
