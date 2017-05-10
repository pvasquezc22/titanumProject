<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlerBayes extends Controller
{
    public function index()
    {
        return view('home');
    }
}