<?php

namespace App\Http\Controllers;

use App\Story;
use App\Type;
use App\UnreadablePost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store( Request $request )
    {
//        $username = $request->username;
//        $type_title = $request->post_type;
//        $password = $request->pwd_hash;
//        $title = $request->post_title;
//        $url = $request->post_url;
//        $parent = $request->post_parent;
//        $hanesst_id = $request->hanesst_id;
//        $text = $request->post_text;
//
//        $types = Type::all();
//
//        if( $type_title == $types->where( 'title', $type_title )->first() )
//        {
//            Story::create( [ 'title'      => $title,
//                             'hanesst_id' => $hanesst_id,
//                             'text'       => $text,
//                             'url'        => $url ] );
//        }

        UnreadablePost::create( [ 'post' => $request->getContent() ] );
    }

    public function lastPost()
    {
        $post = UnreadablePost::all()->last();
        $postToArray = json_decode( $post->post, true );

        return $postToArray[ 'hanesst_id' ];
    }

    public function status()
    {
        $statuses = [ 'Alive',
                      'Update',
                      'Down' ];

        return $statuses[ 0 ];
    }
}
