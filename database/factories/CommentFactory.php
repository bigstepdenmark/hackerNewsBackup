<?php

use Faker\Generator as Faker;
use \App\Story;
use \App\User;

$factory->define( App\Comment::class,
    function( Faker $faker ) use ( $factory ) {

        $stories = Story::all();
        $users = User::all();

        return [ 'comment'   => $faker->realText(),
                 'parent_id' => -1,
                 'hanesst_id' => $faker->numberBetween( 1, 10000 ),
                 'story_id'  => $stories->random()->id,
                 'user_id'   => $users->random()->id ];
    } );
