<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $primaryKey = 'PK_products';
    protected $fillable =['SKU','id_subcategory','name','description','price','avaible','status'];

    public function Categories()
    {
        return $this->belongsTo('App\Subcategorie', 'id_subcategory', 'PK_subcategories');
    }
}
