<?php

use Faker\Generator as Faker;
use \App\Story as Story;
use \App\User as User;

$factory->define( App\Comment::class,
    function( Faker $faker ) use ( $factory ) {

        $stories = Story::all();
        $users = User::all();

        return [ 'comment'   => $faker->realText(),
                 'parent_id' => null,
                 'story_id'  => $stories->random()->id,
                 'user_id'   => $users->random()->id ];
    } );
