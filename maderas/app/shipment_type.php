<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipment_type extends Model
{
    protected $table = 'shipment_type';

    protected $primaryKey = 'PK_shipment_type';
    protected $fillable =['shipment_type','description'];

  
}
