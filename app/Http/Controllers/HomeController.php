<?php

namespace App\Http\Controllers;

use App\Masnod;
use App\Sand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Location;
use App\Http\middleware\Country;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //   // $this->middleware('country');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user())
        return view('home');
      return redirect('/');
    }
    public function calc()
    {
        $sand = Sand::all();
        $masnod = Masnod::all();
        return view('testdistance')->with(['sand'=>$sand, 'masnod'=>$masnod]);
    }
}
