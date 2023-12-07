<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(): \Illuminate\Contracts\Support\Renderable
    {
        return view('home');
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $topics = Topic::orderBy('created_at', 'DESC')->get();
        $dates = Date::orderBy('created_at', 'DESC')->get();

        return view('index', [
            'topics' => $topics,
            'dates' => $dates]);
    }
}
