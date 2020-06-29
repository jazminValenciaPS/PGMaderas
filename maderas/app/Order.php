<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    protected $primaryKey = 'PK_orders';
    protected $fillable =['id_user','id_shipment','date','time','total','id_payment','status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
