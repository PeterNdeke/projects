<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $fillable = [
        'group_id', 'user_id', 'status',
    ];
    public $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
