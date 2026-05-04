<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;

class UserApplicationController extends Controller
{
    // 📋 My Applications
    public function index()
    {
        $applications = Application::with('job')
            ->where('student_id', auth()->id()) // ✅ consistent
            ->latest()
            ->get();

        return view('frontend.applications', compact('applications'));
    }

    // 📝 Apply Form
    public function create($job_id)
    {
        $job = Job::findOrFail($job_id);

        return view('frontend.apply', compact('job'));
    }

    // 🚀 Store Application
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $user = auth()->user();

        // 🔒 Prevent duplicate apply (FIXED)
        $alreadyApplied = Application::where('job_id', $request->job_id)
            ->where('student_id', $user->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'You already applied ❌');
        }

        // 📄 Resume Upload
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // 💾 Save Application
        Application::create([
            'job_id'     => $request->job_id,
            'student_id' => $user->id,   // ✅ IMPORTANT
            'name'       => $user->name,
            'email'      => $user->email,
            'resume'     => $resumePath,
            'status'     => 'pending'
        ]);

        return redirect()->route('my.applications')
            ->with('success', 'Applied Successfully ✅');
    }
}