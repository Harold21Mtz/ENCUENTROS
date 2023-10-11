<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialEventsController extends Controller
{
    public function showSocialEvents()
    {
        return view('program.socialEvents');
    }
}
