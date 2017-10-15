<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('accessToAdminPanel');
    }

    public function index()
    {
        //dd(Auth::user()->getRole());

        return view('admin.home');
    }
}