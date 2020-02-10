<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Vmasnod;
use App\Masnod_request;
use Illuminate\Support\Facades\Hash;
class VmasnodLoginController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.vmasnod_login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
Auth::guard('vmasnod')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
        if($vmasnod = Vmasnod::where('email',$request->email)->first()){

          if(Hash::check($request->password,$vmasnod->password)){
            session(['vmasnod' => $vmasnod->id]);
            return redirect('vmasnod/dashboard');

          }else {
            return redirect()->back()->withInput($request->only('email', 'remember'));
          }
        }else
           return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('vmasnod')->logout();
        return redirect('/');
    }
}
