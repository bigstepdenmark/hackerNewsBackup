<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnreadablePost extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title' ];
}
