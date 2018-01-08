<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\User;
use \App\Http\Resources\User as UserResource;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection( User::all() );
    }

    public function show( User $user )
    {
        return new UserResource( $user );
    }

    public function showByUsername( $username )
    {
        return new UserResource( User::where( 'username', $username )->first() );
    }

    public function register( Request $request )
    {

        $request->validate( [ 'name'     => 'required|string|min:2|max:255',
                              'username' => 'required|string|min:6|max:255|unique:users',
                              'password' => 'required|string|min:6|confirmed', ] );

        User::create( [ 'name'         => $request->name,
                        'username'     => $request->username,
                        'password'     => bcrypt( $request->password ),
                        'karma_points' => 0,
                        'about'        => '' ] );

        return response()->json( [ 'succes'  => true,
                                   'message' => 'User succefully created.' ] );

    }

    public function update( Request $request )
    {
        $user = Auth::user();

        $request->validate( [ 'name'     => 'required|string|min:2|max:255',
                              'username' => 'required|string|min:6|max:255|unique:users,username,' . $user->id . ',id',
                              'about'    => 'nullable|string', ] );

        $user->update( [ 'name'     => $request->name,
                         'username' => $request->username,
                         'about'    => $request->about ] );

        return response()->json( [ 'succes'  => true,
                                   'message' => 'User succefully updated.',
                                   'user'    => Auth::user() ] );

    }

    public function updatePassword( Request $request )
    {
        $request->validate( [ 'password' => 'required|string|min:6|confirmed' ] );

        Auth::user()->update( [ 'password' => bcrypt( $request->password ) ] );

        return response()->json( [ 'succes'  => true,
                                   'message' => 'Your password has been changed successfully.',
                                   'user'    => Auth::user() ] );

    }
}
