<?php

use Faker\Generator as Faker;

$factory->define( App\Type::class,
    function( Faker $faker ) {
        return [ 'title' => $faker->sentence, ];
    } );
