<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassList extends Model
{
    //
    use HasFactory;

    protected $table = 'classlist'; // If your table is named `classlist`

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'course',
    ]; // Specify key type
}
