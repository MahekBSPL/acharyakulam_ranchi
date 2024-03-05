<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable =[
        'language',
        'title',
        'notificationtype',
        'menutype',
        'keyword',
        'description',
        'image',
        'fileupload',
        'url',
        'startdate',
        'enddate'
    ];
}

