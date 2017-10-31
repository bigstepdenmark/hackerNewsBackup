<?php

use Faker\Generator as Faker;
use \App\Story as Story;

$factory->define( App\Comment::class,
    function( Faker $faker ) use ( $factory ) {

        $stories = Story::all();

        return [ 'comment'   => $faker->realText(),
                 'parent_id' => null,
                 'story_id'  => $stories->random()->id ];
    } );
