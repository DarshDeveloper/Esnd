<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Masnod;
use App\Masnods_help;
use Illuminate\Support\Facades\Hash;
class MasnodLoginController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.masnod_login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if($masnod = Masnod::where('email',$request->email)->first()){
          if(Hash::check($request->password,$masnod->password)){
        // Attempt to log the user inre
        if ( Auth::guard('masnod')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
                // Cookie::make('masnod',$masnod->id,30000);
                $masnod_request = Masnods_help::where('masnod_id',$masnod->id)->get();
                session(['masnod' => $masnod->id]);
                return redirect('masnod/dashboard');
                // return response()->view('masnod',['masnod'=> $masnod,'masnod_request'=>$masnod_request])->cookie('masnod',$masnod->id,30000);
        }
      }else
      return redirect()->back()->withInput($request->only('email', 'remember'));
      }else
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('masnod')->logout();
        return redirect('/');
    }
}
