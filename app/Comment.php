<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property string $comment
 * @property int|null $parent_id
 * @property int $story_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Comment|null $parent
 * @property-read \App\Story $story
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $subComments
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereStoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUserId($value)
 * @mixin \Eloquent
 */
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

    public function user()
    {
        return $this->belongsTo( User::class );
    }
}
