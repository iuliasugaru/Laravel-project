<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard');
    }
}
