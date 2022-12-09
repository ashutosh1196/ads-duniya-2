<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;

    public function bank(){
    	return $this->belongsTo(Bank::class,'bank_id');
    }

    public function cardType(){
    	return $this->belongsTo(CreditCardType::class,'type');
    }
}
