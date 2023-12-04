<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements LdapAuthenticatable
{
    use HasFactory, AuthenticatesWithLdap, Notifiable, HasRoles;

    protected $fillable = [

        'name',
        'email',
        'password',
        'role_id'

    ];

    // public function role(){

    //     return $this->belongsTo(Role::class);
    // }
}
