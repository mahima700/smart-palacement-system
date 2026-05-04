<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // ➕ Form Page
    public function index()
    {
        return view('admin.jobs');
    }

    // 💾 Store Job
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'skills' => 'nullable|string',
            'job_type' => 'nullable|string',
            'experience' => 'nullable|string',
            'last_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Job::create($request->only([
            'title',
            'company',
            'location',
            'salary',
            'skills',
            'job_type',
            'experience',
            'last_date',
            'description'
        ]));

        return redirect()->route('admin.dashboard')
            ->with('success', 'Job Posted Successfully ✅');
    }

    // 📋 List
    public function list()
    {
        $jobs = Job::latest()->get();
        return view('admin.job-list', compact('jobs'));
    }

    // ✏ Edit
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs', compact('job'));
    }

    // 🔄 Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'skills' => 'nullable|string',
            'job_type' => 'nullable|string',
            'experience' => 'nullable|string',
            'last_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $job = Job::findOrFail($id);

        $job->update($request->only([
            'title',
            'company',
            'location',
            'salary',
            'skills',
            'job_type',
            'experience',
            'last_date',
            'description'
        ]));

        return redirect()->route('admin.jobs.list')
            ->with('success', 'Job Updated ✅');
    }

    // ❌ Delete
    public function delete($id)
    {
        Job::findOrFail($id)->delete();

        return redirect()->route('admin.jobs.list')
            ->with('success', 'Job Deleted ❌');
    }
}