<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'Products_images';

    protected $primaryKey = 'PK_Product_images';
    protected $fillable =['id_product','image'];

    public function Products()
    {
        return $this->belongsTo('App\Product', 'id_product', 'PK_products');
    }
}
