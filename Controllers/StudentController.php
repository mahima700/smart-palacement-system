<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // ➕ Add Form
    public function index()
    {
        return view('admin.students');
    }

    // 💾 Store
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|unique:students,email',
            'phone'  => 'required|digits:10',
            'course' => 'required|string|max:100',
            'skills' => 'required|string|max:255',
            'status' => 'required|in:pending,placed',
        ]);

        Student::create($request->only([
            'name',
            'email',
            'phone',
            'course',
            'skills',
            'status'
        ]));

        return redirect()->route('admin.students.list')
            ->with('success', 'Student Added ✅');
    }

    // 📋 List
    public function list()
    {
        $students = Student::latest()->get();
        return view('admin.student-list', compact('students'));
    }

    // ✏ Edit
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students', compact('student'));
    }

    // 🔄 Update
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|unique:students,email,' . $id,
            'phone'  => 'required|digits:10',
            'course' => 'required|string|max:100',
            'skills' => 'required|string|max:255',
            'status' => 'required|in:pending,placed',
        ]);

        $student->update($request->only([
            'name',
            'email',
            'phone',
            'course',
            'skills',
            'status'
        ]));

        return redirect()->route('admin.students.list')
            ->with('success', 'Student Updated ✅');
    }

    // ❌ Delete
    public function delete($id)
    {
        Student::findOrFail($id)->delete();

        return back()->with('success', 'Student Deleted ❌');
    }
}