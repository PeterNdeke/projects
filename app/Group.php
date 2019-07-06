<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Group extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'group_logo', 'group_name', 'group_description', 'group_rules', 'group_privacy',
    ];
    protected $appends = ['logo'];
    public $with = ['user', 'group_members'];
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return "group_name";
    }
    public function getLogoAttribute()
    {
        //return $this->getAvatar();
        if (!$this->group_logo == null) {
            return $this->getMedia('images')->first()->getUrl();
        }

    }

    public function addLogo($file)
    {
        return $this->addMedia($file)->toMediaCollection('images');
    }
    //
    public function registerMediaCollections()
    {

        $this->addMediaCollection('images')->singleFile();

    }

    public function group_members()
    {
        return $this->hasMany(GroupMember::class);
    }
}
