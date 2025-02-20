<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
{
    $enrollments = Enrollment::select('first_name', 'last_name')->get();
    return view('admin.enrollments', compact('enrollments'));
}
}
