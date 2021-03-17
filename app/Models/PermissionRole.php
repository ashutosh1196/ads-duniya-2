<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
	use HasFactory, SoftDeletes;

	/**
	 * Get the organization for the recruiter.
	 */
	public function roles() {
		return $this->belongsToMany(Role::class);
	}
}
