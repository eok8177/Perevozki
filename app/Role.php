<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'users_roles');
    }

    public function getRolesAttribute($value)
    {
        return $this->belongsToMany('App\Role', 'users_roles')->pluck('role_id');
    }

    public function getRolesForSelectAttribute()
    {
        return Role::pluck('name', 'id');
    }

}
