<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
    'job_id',
    'student_id',
    'name',
    'email',
    'status' // <-- ADD THIS LINE
];

    // 🔥 Job relation (VERY IMPORTANT)
    public function job()
    {
        return $this->belongsTo(\App\Models\Job::class, 'job_id');
    }
}