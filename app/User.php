<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail, HasMedia, JWTSubject
{
    use Notifiable, friendable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isAdmin', 'username',
    ];

    protected $appends = ['avatar', 'pic'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute()
    {
        //return $this->getAvatar();
        if (!$this->imageUrl == null) {
            return $this->getMedia('images')->first()->getUrl('thumb');
        }

    }
    public function getPicAttribute()
    {
        if (!$this->imageUrl == null) {
            return $this->getMedia('images')->first()->getUrl('bigthumb');
        }
    }
    public function getRouteKeyName()
    {
        return "username";
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function interests()
    {
        return $this->hasMany(Interest::class);

    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('bigthumb')
            ->width(120)
            ->height(120)
            ->performOnCollections('images', 'anotherCollection')
            ->nonQueued();

        $this->addMediaConversion('thumb')

            ->width(50)
            ->height(50);
    }
    public function registerMediaCollections()
    {

        $this->addMediaCollection('images')->singleFile();

    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function overview()
    {
        return $this->hasOne(Overview::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

}
