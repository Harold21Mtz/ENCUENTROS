<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function showHotels()
    {
        return view('contact.hotels');
    }
}
