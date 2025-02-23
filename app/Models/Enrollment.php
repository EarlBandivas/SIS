<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    protected $primaryKey = 'user_id'; // Set user_id as the primary key
    public $incrementing = false; // Disable auto-incrementing for the primary key
    protected $keyType = 'integer'; // Set the key type

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'barangay',
        'municipality',
        'province',
        'gender',
        'contact_number',
        'course',
    ];
}
