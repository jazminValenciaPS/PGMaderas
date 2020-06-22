<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    protected $table = 'subcategories';
    
    protected $primaryKey = 'PK_subcategories';
    protected $fillable =['id_categories','name','description','image','status'];

    public function Categories()
    {
        return $this->belongsTo('App\Categories', 'id_categories', 'PK_categories');
    }
}
