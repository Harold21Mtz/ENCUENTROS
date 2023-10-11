<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbstractSubmissionController extends Controller
{
    public function showAbstractSubmission()
    {
        return view('authorsarea.abstractSubmission');
    }
}
