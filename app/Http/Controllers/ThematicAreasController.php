<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThematicAreasController extends Controller
{
    public function showThematicAreas()
    {
        return view('authorsarea.thematicAreas');
    }
}
