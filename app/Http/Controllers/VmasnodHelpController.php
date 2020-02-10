<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VmasnodHelpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:vmasnod');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vmasnod');
    }
}
