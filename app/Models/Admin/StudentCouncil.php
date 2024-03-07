<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCouncil extends Model
{
    use HasFactory;
    protected $fillable=[
          'student_name',
          'about',
          'image',
          'class',
          'section'
    ];
}
