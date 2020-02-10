<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Sand;
use Illuminate\Support\Facades\Auth;

class SandLoginController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.sand_login');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|min:6'
      ]);

      if($sand = Sand::where('email',$request->email)->first()){
      Auth::guard('sand')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
        if(Hash::check($request->password,$sand->password)){
          session(['sand' => $sand->id]);
          return redirect('sand/dashboard');

        }else {
          return redirect()->back()->withInput($request->only('email', 'remember'));
        }
      }else
         return redirect()->back()->withInput($request->only('email', 'remember'));
  }

    public function logout()
    {
        Auth::guard('sand')->logout();
        return redirect('/');
    }
}
