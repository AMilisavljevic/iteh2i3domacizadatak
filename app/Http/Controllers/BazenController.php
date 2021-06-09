<?php

namespace App\Http\Controllers;

use App\Bazen;
use Illuminate\Http\Request;

class BazenController extends Controller
{
    public function show($id)
    {
        return view(
            'stranice.bazen',
            [
                'bazen' => Bazen::find($id)
            ]
        );
    }
    public function getAll()
    {
        return response()->json([
            'bazeni' => Bazen::all()
        ]);
    }
  
}
