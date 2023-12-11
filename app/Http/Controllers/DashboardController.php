<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Slide;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
        $slides = Slide::orderBy('created_at', 'DESC')->get();
        return view('include.dashboard', ['user' => $user, 'slides'=> $slides]);
    }

    public function index(){
        $topics = Topic::orderBy('created_at', 'DESC')->get();
        $dates = Date::orderBy('created_at', 'DESC')->get();
        $slides = Slide::orderBy('created_at', 'DESC')->get();

        return view('index', [
            'topics' => $topics,
            'dates' => $dates,
            'slides'=> $slides]);
    }
}
