<?php

namespace App\Http\Controllers;

use App\Models\Commerce;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:home')->only('index');
    }
    
    public function index()
    {
        $commerce = Commerce::where('id', 1)->firstOrFail();

        $image = $commerce->logo;

        return view('home', compact('image'));
    }
}