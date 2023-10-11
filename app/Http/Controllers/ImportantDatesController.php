<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportantDatesController extends Controller
{
    public function showImportantDates()
    {
        return view('authorsarea.importantDates');
    }
}
