<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
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
    
        try {
            Enrollment::create([
                'user_id' => auth()->id(),
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'age' => $request->age,
                'barangay' => $request->barangay,
                'municipality' => $request->municipality,
                'province' => $request->province,
                'gender' => $request->gender,
                'contact_number' => $request->contact_number,
                'course' => $request->course,
            ]);
    
            return redirect()->back()->with('success', 'Enrollment submitted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Enrollment submission failed. Please try again.');
        }
    }


    public function update(Request $request, $user_id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
        ]);
    
        // Find the enrollment record by ID
        $enrollment = Enrollment::where('user_id', $user_id)->where('user_id', auth()->id())->first();
    
        if (!$enrollment) {
            return redirect()->back()->with('error', 'No profile record found.');
        }
    
        // Update the enrollment details
        $enrollment->update($validatedData);
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }



public function getEnrollmentByUser($user_id) {
    $enrollment = Enrollment::where('user_id', $user_id)->first();

    if (!$enrollment) {
        return response()->json(['error' => 'Enrollment not found'], 404);
    }

    return response()->json($enrollment);
}

public function index()
{
    $enrollments = Enrollment::all(); // Fetch all enrollments

    return view('layouts.applicants', compact('enrollments'));
}

public function profile()
{
    $enrollments = Enrollment::where('user_id', auth()->id())->get(); // Fetch enrollments for the logged-in user

    return view('profile.partials.profile', compact('enrollments')); // Replace with your actual Blade file name
}



}
