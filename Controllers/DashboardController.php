<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ✅ student_id use karo
        $applications = Application::where('student_id', $user->id)->get();

        $totalApplications = Application::where('student_id', $user->id)->count();

        $selected = Application::where('student_id', $user->id)
                        ->where('status', 'approved')->count();

        $pending = Application::where('student_id', $user->id)
                        ->where('status', 'pending')->count();

        $rejected = Application::where('student_id', $user->id)
                        ->where('status', 'rejected')->count();

        // ✅ Recent Applications
        $recentApplications = Application::with('job')
            ->where('student_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'applications',
            'totalApplications',
            'selected',
            'pending',
            'rejected',
            'recentApplications'
        ));
    }
}