<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model {

	use HasFactory, SoftDeletes;

	/**
	 * The skill that belong to the jobs.
	*/
	public function skills() {
		return $this->belongsToMany(JobSkill::class);
	}
	
}
