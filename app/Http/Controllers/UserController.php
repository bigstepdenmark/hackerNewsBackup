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
        return new UserCollection( User::all() );
    }

    public function show( User $user )
    {
        return new UserResource( $user );
    }
}
