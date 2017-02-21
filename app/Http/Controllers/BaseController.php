<?php

namespace App\Http\Controllers;

use Teepluss\Theme\Contracts\Theme;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //
    public function getIndex(){
    	return view('home.index');

    }
    public function index(){

    }
}
