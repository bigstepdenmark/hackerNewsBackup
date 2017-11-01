<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'stories',
            function( Blueprint $table ) {
                $table->increments( 'id' );
                $table->string( 'title' )->nullable();
                $table->text( 'text' )->nullable();
                $table->integer('hanesst_id');
                $table->string( 'url', 1000 );

                $table->integer( 'points' )->default( 0 );
                $table->boolean( 'is_spam' )->default( false );

                $table->unsignedInteger( 'type_id' )->nullable();
                $table->foreign( 'type_id' )->references( 'id' )->on( 'types' );

                $table->unsignedInteger( 'user_id' );
                $table->foreign( 'user_id' )->references( 'id' )->on( 'users' );

                $table->timestamps();
            } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'stories' );
    }
}
