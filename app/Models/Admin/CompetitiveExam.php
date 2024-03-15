<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitiveExam extends Model
{
    use HasFactory;

    protected $fillable =[
        'selectyear',
        'name',
        'pdf'
    ];
}
