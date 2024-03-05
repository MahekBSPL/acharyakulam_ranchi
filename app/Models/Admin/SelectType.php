<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectType extends Model
{
    use HasFactory;
    protected $fillable =[
        'value',
    ];
}
