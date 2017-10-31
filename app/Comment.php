<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'comment',
                            'parent_id', ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function story()
    {
        return $this->belongsTo( Story::class );
    }

    public function parent()
    {
        return $this->belongsTo( Comment::class, 'parent_id', 'id' );
    }

    public function subComments()
    {
        return $this->hasMany( Comment::class );
    }
}
