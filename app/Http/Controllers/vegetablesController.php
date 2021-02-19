<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vegetablesController extends Controller
{
    //
    public function index(){
    	return view('vegetables');
    } 
}
