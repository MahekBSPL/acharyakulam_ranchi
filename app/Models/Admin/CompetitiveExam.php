<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitiveExam extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'name',
        'year',
        'image',
        'pdf',
    ];
}
