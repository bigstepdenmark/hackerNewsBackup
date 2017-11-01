<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Resources\CommentCollection;
use \App\Http\Resources\Comment as CommentResource;
use App\Story;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return new CommentCollection( Comment::all() );
    }

    public function show( Comment $comment )
    {
        return new CommentResource( $comment );
    }
}
