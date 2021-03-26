<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookmarkedJob extends Model {
	use HasFactory, SoftDeletes;

	public function job() {
		return $this->belongsTo(Job::class);
	}
}
