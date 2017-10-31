<?php

use Faker\Generator as Faker;
use \App\User as User;

$factory->define( App\Story::class,
    function( Faker $faker ) use ( $factory ) {

        $users = User::all();

        return [ 'url'     => $faker->url,
                 'points'  => $faker->randomDigitNotNull,
                 'is_spam' => $faker->boolean( 10 /* chanceOfGettingTrue = 10 */ ),
                 'user_id' => $users->random()->id ];
    } );
