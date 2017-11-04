<?php

namespace App\Http\Controllers;

use App\Story;
use App\Type;
use App\UnreadablePost;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        return UnreadablePost::all();
    }

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

        if( substr( $request->getContent(), 0, 1 ) == "{" && substr( $request->getContent(), -1 ) == "}" )
        {
            if( UnreadablePost::create( [ 'post' => $request->getContent() ] ) )
            {
                Log::info('The data from Simulator successfully persisted.', ['data' => $request->getContent()]);
                return response( [ 'data'   => json_decode( $request->getContent() ),
                                   'status' => [ 'code'        => 200,
                                                 'description' => 'OK',
                                                 'message'     => 'Your data successfully persisted.' ] ] );
            }
        }

        Log::error('The data could not be persisted succesfully');
        return response( [ 'status' => [ 'code'        => 400,
                                         'description' => 'Bad Request',
                                         'message'     => 'Something went wrong, please try again.' ] ] );


    }

    public function lastPost()
    {
        $post = UnreadablePost::all()->last();

        if( $post )
        {
            $postToArray = json_decode( $post->post, true );

            return $postToArray[ 'hanesst_id' ];
        }

        return "Nothing to show!";
    }

    public function status()
    {
        $statuses = [ 'Alive',
                      'Update',
                      'Down' ];

        return $statuses[ 0 ];
    }
}
