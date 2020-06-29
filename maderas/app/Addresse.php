<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    protected $table = 'addresses';
    
    protected $primaryKey = 'PK_addresses';
    protected $fillable =['id_user','street','city','state','postal_code','suburb','reference','is_default','status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
