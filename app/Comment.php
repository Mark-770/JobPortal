<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\User;

class Comment extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
