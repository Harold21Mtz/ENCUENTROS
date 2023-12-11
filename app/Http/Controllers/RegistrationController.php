<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function showRegistration()
{
    $slides = Slide::all();
    return view('registration', ['slides' => $slides]);
}
}
