<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseActivity extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image',
        'description'
    ];
}
