<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    protected $primaryKey = 'id';
   
    protected $fillable = [
        'id_person','id_role','email', 'password','id_branch','status',
    ];

    public function person()
    {
        return $this->belongsTo('App\Person', 'id_person', 'PK_persons');
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol', 'id_role', 'PK_roles');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
