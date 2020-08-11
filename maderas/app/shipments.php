<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipments extends Model
{
    protected $table = 'shipments';

    protected $primaryKey = 'PK_shipments';
    protected $fillable =['id_type','id_address','shipping_date','shipping_time','subtotal','status'];

    public function shipment_type()
    {
        return $this->belongsTo('App\shipment_type', 'id_type', 'PK_shipment_type');
    }
    public function shipping_date()
    {
        return $this->belongsTo('App\shipment_type', 'status', 'PK_shipment_status');
    }
}
