<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'age', 
        'barangay', 'municipality', 'province', 
        'gender', 'contact_number', 'course'
    ];
}
