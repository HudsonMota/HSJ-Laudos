<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Permission extends Model
{
    protected $table = "permissions";

    public function roles()
    {
        return $this->belongsToMany(\App\Role::class);
    }
}
