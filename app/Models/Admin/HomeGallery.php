<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'url',
        'order',
        'image'
    ];
}
