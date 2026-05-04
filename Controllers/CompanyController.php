<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    // ➕ Add form
    public function index()
    {
        return view('admin.add-company');
    }

    // 💾 Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'location' => 'required|string|max:255',
        ]);

        Company::create($request->only(['name', 'email', 'location']));

        return back()->with('success', 'Company Added Successfully ✅');
    }

    // 📋 List
    public function list()
    {
        $companies = Company::latest()->get();
        return view('admin.company-list', compact('companies'));
    }

    // ✏ Edit
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.add-company', compact('company'));
    }

    // 🔄 Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'location' => 'required|string|max:255',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->only(['name', 'email', 'location']));

        return redirect()->route('admin.company.list')
            ->with('success', 'Company Updated ✅');
    }

    // ❌ Delete
    public function delete($id)
    {
        Company::findOrFail($id)->delete();

        return back()->with('success', 'Company Deleted ❌');
    }
}