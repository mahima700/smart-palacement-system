<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
    'title',
    'company',
    'location',
    'salary',
    'skills',
    'job_type',
    'experience',
    'last_date',
    'description'
];
}
