<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopperStudent extends Model
{
    use HasFactory;
    protected $fillable=[
        'pdf',
        'title'
    ];
}
