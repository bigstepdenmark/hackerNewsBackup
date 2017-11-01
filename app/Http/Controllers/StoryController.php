<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentCollection;
use App\Http\Resources\Story as StoryResource;
use App\Http\Resources\StoryCollection;
use App\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        return new StoryCollection( Story::all() );
    }

    public function show( Story $story )
    {
        return new StoryResource( $story );
    }

    public function comments( Story $story )
    {
        return new CommentCollection( $story->comments );
    }
}
