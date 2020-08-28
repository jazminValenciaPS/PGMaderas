<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipment_status extends Model
{
    protected $table = 'shipment_status';
    
    protected $primaryKey = 'PK_shipment_status';
    protected $fillable =['name','description'];

}
