<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MdBrand;
use App\Models\MdModel;
use App\Models\MdDropdown;
use App\Models\InventoryFile;

class Inventory extends Model
{
    use HasFactory;

    public function make(){
    	return $this->belongsTo(MdBrand::class,'make_id','id');
    }
    public function model(){
    	return $this->belongsTo(MdModel::class,'model_id','id');
    }
    public function getFile(){
    	return $this->hasOne(InventoryFile::class,'inventory_id','id');
    }

}
