<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriedController extends Controller
{
    
    public function index(){
        return view('drieds');
    } 
}
