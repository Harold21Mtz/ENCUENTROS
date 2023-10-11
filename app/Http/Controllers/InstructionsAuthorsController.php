<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructionsAuthorsController extends Controller
{
    public function showInstructionsAuthors()
    {
        return view('authorsarea.instructionsAuthors');
    }
}
