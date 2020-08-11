<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_type extends Model
{
    protected $table = 'payment_type';

    protected $primaryKey = 'PK_payment_type';
    protected $fillable =['name_type'];

}
