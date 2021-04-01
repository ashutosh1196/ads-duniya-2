<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSearchHistory extends Model {

    use HasFactory;
	
		protected $casts = [
			'industry' => 'array',
			'job_type' => 'array',
    ];
}
