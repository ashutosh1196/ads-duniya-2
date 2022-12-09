<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const PAY_LATER = 'pay later';
    public const HOME = 'home';
    public const BUSINESS = 'business';
    public const PERSONAL = 'personal';
    public const CAR = 'car';
    // public const EDUCATION = 'education';
    // public const TWO_WHEELER = 'two-wheeler';
    // public const USED_CAR = 'used-car';
    // public const UNSECURED = 'unsecured';

    public const LOANS = [
        'pay later',
	    'personal',
	    'business',
    	'home',
	    'car',
	    // 'education',
	    // 'two-wheeler',
	    // 'used-car',
	    // 'unsecured',
    ];

    public function bank(){
    	return $this->belongsTo(Bank::class,'bank_id');
    }
}
