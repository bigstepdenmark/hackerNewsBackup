<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property int $karma_points
 * @property string $about
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Story[] $stories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAbout( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereKarmaPoints( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername( $value )
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name',
                            'username',
                            'password',
                            'karma_points',
                            'about' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password',
                          'remember_token', ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function stories()
    {
        return $this->hasMany( Story::class );
    }

    public function comments()
    {
        return $this->hasMany( Comment::class );
    }

    // To use Passport
    public function findForPassport($identifier) {
        return $this->where('username', $identifier)->first();
    }
}
