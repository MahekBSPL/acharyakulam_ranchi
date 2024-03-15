<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable =[
        'menu_category',
        'parent_menu',
        'title',
        'menutype',
        'keyword',
        'description',
        'image',
        'fileupload',
        'url',
        'menu_position',
        'banner_image',
        'admin_id',
        'status',
    ];
}
