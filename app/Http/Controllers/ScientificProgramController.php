<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScientificProgramController extends Controller
{
    public function showScientificProgram()
    {
        return view('program.scientificProgram');
    }
}
