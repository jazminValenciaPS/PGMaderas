<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    protected $table = 'subcategories';
    
    protected $primaryKey = 'PK_subcategories';
    protected $fillable =['id_category','name','description','image','status'];

    public function Categories()
    {
        return $this->belongsTo('App\Categories', 'id_category', 'PK_categories');
    }
}
