<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistoryApplication extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_id','applicant_type'];

    public function jobHistory()
    {
    	return $this->belongsTo(JobHistory::class);
    }

    public function applicant()
    {
        return $this->morphTo();
    }
}
