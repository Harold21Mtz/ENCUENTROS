<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Models\Date;
use App\Models\Index;
use App\Models\Slide;
use App\Models\Topic;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
        $slides = Slide::orderBy('created_at', 'DESC')->get();
        return view('modules-admin.dashboard', ['user' => $user, 'slides'=> $slides]);
    }

}
