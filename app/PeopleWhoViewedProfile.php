<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleWhoViewedProfile extends Model
{
    protected $fillable = ['viewed_profile_id', 'viewed_by','username'];

    public function viewedProfile()
    {
        return $this->belongsTo(ViewedProfile::class);
    }
}
