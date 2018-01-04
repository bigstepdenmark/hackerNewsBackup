<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Story;
use App\Type;
use App\UnreadablePost;
use App\User;
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
                //Log::info('The data from Simulator successfully persisted.', ['data' => $request->getContent()]);
                return response( [ 'data'   => json_decode( $request->getContent() ),
                                   'status' => [ 'code'        => 200,
                                                 'description' => 'OK',
                                                 'message'     => 'Your data successfully persisted.' ] ] );
            }
        }

        Log::error( 'The data from simulator could not be persisted succesfully' );

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

    public function toRealPosts()
    {
        $posts = UnreadablePost::all();
        $storyType = Type::where( 'title', 'story' )->first();
        $commentType = Type::where( 'title', 'comment' )->first();
        $storiesData = [];
        $commentsData = [];

        foreach( $posts as $post )
        {
            $body = $this->decodePost( $post );

            if( $this->isType( $storyType, $post ) )
            {
                $storiesData[] = [ 'title'      => $body->post_title,
                                   'text'       => $body->post_text,
                                   'hanesst_id' => $body->hanesst_id,
                                   'url'        => $body->post_url,
                                   'type_id'    => $storyType->id,
                                   'user_id'    => $this->getUserId( $body->username ),
                                   'created_at' => $post->created_at ];
            }
            elseif( $this->isType( $commentType, $post ) )
            {
                $commentsData[] = [ 'comment'    => $body->post_title . " " . $body->post_text . " " . $body->post_url,
                                    'parent_id'  => $body->post_parent,
                                    'story_id'   => null,
                                    'user_id'    => $this->getUserId( $body->username ),
                                    'hanesst_id' => $body->hanesst_id,
                                    'created_at' => $post->created_at ];
            }
        }

        // Insert Stories
        Story::insert( $storiesData );

        // Insert Comments
        Comment::insert( $commentsData );

        // Set Unreadable post status to inported
        $posts->delete();

        //return dd( json_decode( $posts[ 0 ] )->username );
    }

    private function isType( Type $type, UnreadablePost $post )
    {
        $body = json_decode( $post->post );

        return $body->post_type == $type->title;
    }

    private function decodePost( UnreadablePost $post )
    {
        return json_decode( $post->post );
    }

    private function getUserId( String $username )
    {
        $user = User::where( 'username', $username )->first();

        return $user ? $user->id : -1;
    }
}

/*
 * {"username": "joshwa",
 * "pwd_hash": "Z1WhBCcNT3",
 * "post_type": "story",
 * "post_title": "Important Questions Startup Co-Founders Should Ask Each Other",
 * "post_text": "",
 * "post_parent": -1,
 * "post_url": "http://onstartups.com/home/tabid/3339/bid/99/Important-Questions-Startup-Co-Founders-Should-Ask-Each-Other.aspx",
 * "hanesst_id": 605}
 * */
