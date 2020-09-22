<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $fillable = ['name', 'display_name'];

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'role_user', 'role_id', 'user_id');
    }
}
