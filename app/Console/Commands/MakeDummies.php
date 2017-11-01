<?php

namespace App\Console\Commands;

use App\Comment;
use App\Story;
use App\Type;
use App\User;
use Illuminate\Console\Command;

class MakeDummies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dummies {quantity}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate dummy data for database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // If generating succeed
        if( $this->generateDummies( $this->argument( 'quantity' ) ) )
        {
            // then update all comments.
            $this->updateComments();
            $this->info( 'Dummies is created!' );
        }
        else
        {
            $this->error( 'Dummies is not created!' );
        }
    }

    /**
     * Generate dummies
     *
     * @param int $quantity
     *
     * @return bool
     */
    private function generateDummies( $quantity )
    {
        // Parse to int
        $quantity = intval( $quantity );

        // Count comments before creating dummies.
        $beforeCreating = Comment::all()->count();

        // Creating dummies.
        factory( User::class, $quantity )->create();
        $this->createStoryTypes();
        factory( Story::class, $quantity )->create();
        factory( Comment::class, $quantity )->create();

        // Count comments after creating dummies.
        $afterCreating = Comment::all()->count();

        return $afterCreating > $beforeCreating;
    }

    /**
     * Update comments.
     */
    private function updateComments()
    {
        $comments = Comment::all();

        foreach( $comments as $comment )
        {
            $comment->update( [ 'parent_id' => $comments->random()->id ] );
        }
    }

    private function createStoryTypes()
    {
        if( Type::all()->count() !== 4 )
        {
            Type::insert( [ [ 'title' => 'story' ],
                            [ 'title' => 'comment' ],
                            [ 'title' => 'poll' ],
                            [ 'title' => 'pollopt' ], ] );
        }
    }
}
