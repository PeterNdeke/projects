<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewedProfile extends Model
{
    protected $fillable = ['username'];
    public $with = ['user'];

    public function peopleWhoViewedProfile()
    {
        return $this->hasMany(PeopleWhoViewedProfile::class);
    }

    public function getRouteKeyName()
    {
        return "username";
    }
    public function user()
    {
        return $this->hasOne(User::class, 'username', 'username');
    }
}
