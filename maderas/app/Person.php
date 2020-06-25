<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    
    protected $primaryKey = 'PK_persons';
    protected $fillable =['first_name','last_name','phone','birth_date','gender'];
}
