<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasnodHelpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:masnod');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masnod');
    }
}
