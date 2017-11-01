<?php

namespace App\Http\Controllers;

use App\Http\Resources\Story as StoryResource;
use App\Http\Resources\StoryCollection;
use App\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        //return new StoryResource( Story::first() );
        return new StoryCollection( Story::all() );
    }
}
