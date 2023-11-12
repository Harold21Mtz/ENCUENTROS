<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishingOptionsController extends Controller
{
    public function showPublishingOptions()
    {
        return view('authors-area.publishingOptions');
    }
}
