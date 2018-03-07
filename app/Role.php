<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /*
    *  User to role relationship
    *  A Role can have many users
    */
    public function users()
    {
        return $this
            ->belongsToMany(‘App\User’)
            ->withTimestamps();
    }
}
