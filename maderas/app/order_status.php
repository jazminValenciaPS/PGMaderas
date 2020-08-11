<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_status extends Model
{
    protected $table = 'order_status';

    protected $primaryKey = 'PK_order_status';
    protected $fillable =['status_name','description'];
}
