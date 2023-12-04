<?php

namespace App\Models;

use App\Events\UserCreated;
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




    protected $guard_name = 'web';

    protected $fillable = [

        'username',
        'name',
        'email',
        'password',
        //'role_id'

    ];

    protected static function boot()
    {

        parent::boot();

        static::created(function ($user) {
            // Dispatch the event when a new user is created
            event(new UserCreated($user));
        });
    }

    // public function role(){

    //     return $this->belongsTo(Role::class);
    // }
}
