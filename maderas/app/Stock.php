<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    
    protected $primaryKey = 'PK_subcategories';
    protected $fillable =['id_PG_branches','id_product','avaible','status'];

    public function PGbranches()
    {
        return $this->belongsTo('App\PGBranches', 'id_PG_branche', 'PK_PG_branches');
    }
}
