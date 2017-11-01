<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\User;
use \App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function index()
    {
        // return new UserResource( User::find( 1 ) );
        //return UserResource::collection( User::all() );
        return new UserCollection(User::all());
    }
}
