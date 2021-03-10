<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model {
	use HasFactory;

	protected $fillable = [
		'job_ref_number',
		'job_title',
		'job_description',
		'job_type',
		'is_featured',
		'job_address',
		'city',
		'county',
		'state',
		'country',
		'pincode',
		'latitude',
		'longitude',
		'job_industry_id',
		'job_function_id',
		'job_location_id',
		'package_range_from',
		'package_range_to',
		'salary_currency',
		'experience_range_min',
		'experience_range_max',
		'status',
		'recruiter_id',
		'organization_id',
		'created_by',
		'expiring_at',
		'job_url',
		'company_logo'
	];
}
