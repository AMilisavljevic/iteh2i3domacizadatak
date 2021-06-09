<?php

namespace App\Http\Controllers;

use App\Bazen;
use App\Termin;
use Illuminate\Http\Request;

class TerminController extends Controller
{
    public function getAll(Request $request)
    {

        if ($request->has('id'))
            return response()->json([
                'termini' => Bazen::find($request->input('id'))->termini()->get()
            ]);
        else
            return response()->json([
                'termini' => Termin::with('bazen')->get()
            ]);
    }
}
