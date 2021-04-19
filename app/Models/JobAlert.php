<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAlert extends Model
{
    use HasFactory;

    protected $fillable = [
    	'keywords',
    	'locations',
    	'distance',
    	'min_salary',
    	'max_salary',
    	'job_types',
    	'job_posted'
    ];
}
