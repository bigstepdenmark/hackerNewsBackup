<?php

use Faker\Generator as Faker;
use \App\User;
use \App\Type;

$factory->define( App\Story::class,
    function( Faker $faker ) use ( $factory ) {

        $users = User::all();
        $storyTypes = Type::all();

        return [ 'title'      => $faker->sentence,
                 'text'       => $faker->realText(),
                 'hanesst_id' => $faker->numberBetween( 1, 10000 ),
                 'url'        => $faker->url,
                 'points'     => $faker->randomDigitNotNull,
                 'is_spam'    => $faker->boolean( 10 /* chanceOfGettingTrue = 10 */ ),
                 'type_id'    => $storyTypes->random()->id,
                 'user_id'    => $users->random()->id ];
    } );