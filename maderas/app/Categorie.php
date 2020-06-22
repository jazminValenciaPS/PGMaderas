<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    
    protected $primaryKey = 'PK_categories';
    protected $fillable =['name','description','image','status'];

}
