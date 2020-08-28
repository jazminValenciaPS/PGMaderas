<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $primaryKey = 'PK_products';
    protected $fillable =['SKU','id_products_categories','name','description','price','destacado','status'];

    public function productsCategories()
    {
        return $this->belongsTo('App\ProductCategories', 'id_products_categories', 'PK_products_categories');
    }

}
