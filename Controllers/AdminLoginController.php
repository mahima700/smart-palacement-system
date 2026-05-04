<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    // 1️⃣ Show Admin Login Form
    public function showLoginForm()
    {
        return view('admin.login'); // resources/views/admin/login.blade.php
    }

    // 2️⃣ Handle Admin Login
    public function login(Request $request)
    {
        // Input validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find admin by email
        $admin = Admin::where('email', $request->email)->first();

        // Check if admin exists & password matches
        if ($admin && Hash::check($request->password, $admin->password)) {
            // ✅ Login successful → set session
            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->name);

            // Redirect to dashboard
            return redirect()->route('admin.dashboard');
        }

        // ❌ Login failed → back with error
        return back()->with('error', 'Invalid Email or Password');
    }

    // 3️⃣ Admin Logout
    public function logout()
    {
        // Remove session data
        Session::forget('admin_id');
        Session::forget('admin_name');

        // Redirect to login
        return redirect()->route('admin.login');
    }
}