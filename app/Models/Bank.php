<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const ACTIVE = 1;
    public const INACTIVE = 0;

    public function savingAccounts(){
        return $this->hasMany(SavingAccount::class,'bank_id');
    }
}
