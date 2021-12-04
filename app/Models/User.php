<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Checks the role of the user
     * 
     * @return belongsTo
     * **/

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Checks if user is in the given role
     * 
     * @param array of roleslugs
     * 
    */
    public function inRole(Array $roleSlugs)
    {
        foreach ($roleSlugs as $roleSlug) {
            if ($roleSlug == $this->role->slug) {
                return true;
            }
        }
        return false;
    }
}
