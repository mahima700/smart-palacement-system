<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Job;
use App\Models\Application;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalStudents = Student::count();

        $placedStudents = Student::where('status', 'placed')->count();

        $totalJobs = Job::count();

        $recentJobs = Job::latest()->take(5)->get();

        $pendingApplications = Application::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalStudents',
            'placedStudents',
            'totalJobs',
            'recentJobs',
            'pendingApplications'
        ));
    }
}