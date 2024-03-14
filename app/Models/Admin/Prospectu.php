<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospectu extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'image',
        'pdf'
    ];
}
