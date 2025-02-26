<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassList;
use App\Models\Enrollment;

class ApproveController extends Controller
{
    //
    public function approveStudent($user_id)
{
    // Check if the student is already approved
    $existingClasslist = ClassList::where('student_id', $user_id)->first();
        if ($existingClasslist) {
            return redirect()->back()->with('error', 'This student is already approved.');
        }

    // Get the enrollment data
    $enrollment = Enrollment::where('user_id', $user_id)->first();

    if (!$enrollment) {
        return redirect()->back()->with('error', 'Student enrollment not found.');
    }

    // Insert data into classlist without removing the enrollment record
    ClassList::create([
        'student_id' => $enrollment->user_id, // Use student_id
        'first_name' => $enrollment->first_name,
        'last_name' => $enrollment->last_name,
        'course' => $enrollment->course,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Student approved successfully!');
}

}
