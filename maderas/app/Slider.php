<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    
    protected $primaryKey = 'PK_slider';
    protected $fillable =['title','description','image','status'];
}
