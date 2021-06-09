<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BazeniController extends Controller
{
    public function index(){
        return view('stranice.bazeni');
    }


}
