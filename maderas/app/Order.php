<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    protected $primaryKey = 'PK_orders';
    protected $fillable =['id_user','id_shipment','date','time','total','id_payment','status'];

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function shipments(){
        return $this->belongsTo('App\User', 'id_shipment', 'PK_shipments');
    }
    public function payment(){
        return $this->belongsTo('App\payment_type', 'id_payment', 'PK_payment_type');
    }
    public function order_status(){
        return $this->belongsTo('App\order_status', 'status', 'PK_order_status');
    }
}
