<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Story
 *
 * @property int $id
 * @property string $url
 * @property int $points
 * @property int $is_spam
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \App\Type $type
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Story whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Story whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Story whereIsSpam( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Story wherePoints( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Story whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Story whereUrl( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Story whereUserId( $value )
 * @mixin \Eloquent
 */
class Story extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title',
                            'text',
                            'hanesst_id',
                            'url',
                            'points',
                            'is_spam',
                            'type_id' ];

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

    public function type()
    {
        return $this->belongsTo( Type::class );
    }
}
