<?php

namespace App\Http\Controllers\pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TerminiController extends Controller
{
    public function index(){
        return view('stranice.termini');
    }
}
