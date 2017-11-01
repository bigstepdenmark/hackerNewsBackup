<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Type
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Story[] $stories
 * @mixin \Eloquent
 */
class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title' ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function stories()
    {
        return $this->hasMany( Story::class );
    }
}
