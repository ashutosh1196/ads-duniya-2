<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdModel extends Model
{
    use HasFactory;


    public function make(){
    	return $this->belongsTo(MdBrand::class,'brand_id','id');
    }

}
