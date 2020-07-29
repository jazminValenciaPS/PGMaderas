<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $table = 'products_categories';
    
    protected $primaryKey = 'PK_products_categories';
    protected $fillable =['name','id_subcategories','image','status'];

    public function Subcategorie()
    {
        return $this->belongsTo('App\Subcategorie', 'id_subcategories', 'PK_subcategories');
    }
}
