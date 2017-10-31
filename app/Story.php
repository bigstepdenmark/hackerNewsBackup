<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'link',
                            'points',
                            'is_spam', ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function comments()
    {
        return $this->hasMany( Comment::class );
    }
}
