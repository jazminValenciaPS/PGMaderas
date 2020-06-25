<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    
    protected $primaryKey = 'PK_roles';
    protected $fillable =['first_name','roles_name','description'];
}
