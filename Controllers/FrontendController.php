<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function jobs()
    {
        $jobs = Job::latest()->get();

        // ✅ only current user's applied jobs
        $appliedJobs = [];

        if (auth()->check()) {
            $appliedJobs = Application::where('student_id', auth()->id())
                ->pluck('job_id')
                ->toArray();
        }

        return view('frontend.jobs', compact('jobs', 'appliedJobs'));
    }
}