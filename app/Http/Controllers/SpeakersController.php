<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakersController extends Controller
{
    public function showSpeakers()
    {
        return view('program.speakers');
    }
}
