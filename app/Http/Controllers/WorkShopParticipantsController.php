<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkShopParticipantsController extends Controller
{
    public function showWorkShopParticipants()
    {
        return view('program.workShopParticipants');
    }
}
