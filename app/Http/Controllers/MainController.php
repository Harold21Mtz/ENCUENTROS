<?php

namespace App\Http\Controllers;

use App\Models\Portada;
use App\Models\whyChooseUs;
use Illuminate\Http\Request;
use App\Http\Controllers\PortadaController;
use App\Http\Controllers\whyChooseUsController;

class MainController extends Controller
{
    public function showCombinedData()
    {
        $portadas = Portada::where('estado', 1)->get();
        $whyChooseUs = whyChooseUs::where('estado', 1)->get();
        return view('welcome',
            [
                'portadas' => $portadas,
                'whyChooseUs' => $whyChooseUs,
            ]);
    }
}
