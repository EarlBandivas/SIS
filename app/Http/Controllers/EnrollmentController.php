<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'age' => 'required|integer|min:16',
        'barangay' => 'required|string|max:255',
        'municipality' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'gender' => 'required|string',
        'contact_number' => 'required|string|max:15',
        'course' => 'required|string|max:255',
    ]);

    Enrollment::create($request->all());

    return redirect()->back()->with('success', 'Enrollment submitted successfully!');

}
public function index()
{
    $enrollments = Enrollment::all(); // Fetch all enrollments

    return view('layouts.applicants', compact('enrollments'));
}
}
