<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopperStudentImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'image'
    ];
}
