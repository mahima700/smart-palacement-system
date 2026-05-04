<?php

namespace App\Http\Controllers;

use App\Models\Application;

class ApplicationController extends Controller
{
    // 👨‍💼 Admin: All applications
    public function list()
    {
        $applications = Application::with('job')->latest()->get();
        return view('admin.applications', compact('applications'));
    }

    // ✅ Approve
    public function approve($id)
    {
        return $this->updateStatus($id, 'approved');
    }

    // ❌ Reject
    public function reject($id)
    {
        return $this->updateStatus($id, 'rejected');
    }

    // 🔥 Common function (BEST PRACTICE)
    private function updateStatus($id, $status)
    {
        $app = Application::findOrFail($id);

        // Prevent duplicate action
        if ($app->status === $status) {
            return back()->with('error', 'Already ' . ucfirst($status));
        }

        $app->update(['status' => $status]);

        return back()->with('success', 'Application ' . ucfirst($status) . ' ✅');
    }
}