<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Vsand;
class VsandLoginController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.vsand_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($vsand = Vsand::where('email',$request->email)->first()){
          Auth::guard('vsand')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
          if(Hash::check($request->password,$vsand->password)){
            session(['vsand' => $vsand->id]);
            return redirect('vsand/dashboard');

          }else {
            return redirect()->back()->withInput($request->only('email', 'remember'));
          }
        }else
           return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('vsand')->logout();
        return redirect('/');
    }
}
