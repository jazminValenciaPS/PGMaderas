<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PGBranches extends Model
{
    protected $table = '_p_g_branches';
    
    protected $primaryKey = 'PK_PG_branches';
    protected $fillable =['number_branch','state','	city','	suburb','street','number','postal_code','phone'];


}
