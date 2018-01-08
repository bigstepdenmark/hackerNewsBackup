<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentCollection;
use App\Http\Resources\Story as StoryResource;
use App\Http\Resources\StoryCollection;
use App\Story;
use Illuminate\Http\Request;
use Auth;

class StoryController extends Controller
{
    public function index()
    {
        return new StoryCollection( Story::orderBy( 'id', 'desc' )->get() );
    }

    public function show( Story $story )
    {
        return new StoryResource( $story );
    }

    public function comments( Story $story )
    {
        return new CommentCollection( $story->comments );
    }

    public function store( Request $request )
    {
        $user = Auth::user();

        $request->validate( [ 'title' => 'required|string|min:2|max:255',
                              'text'  => 'required|string|min:2|max:1000',
                              'url'   => 'required|url' ] );

        $user->stories()->create( [ 'title'      => $request->title,
                                    'text'       => $request->text,
                                    'url'        => $request->url,
                                    'hanesst_id' => 1,
                                    'points'     => 0,
                                    'is_spam'    => false,
                                    'type_id'    => 1 ] );

        return response()->json( [ 'succes'  => true,
                                   'message' => 'Your Story has been created successfully.' ] );
    }
}
