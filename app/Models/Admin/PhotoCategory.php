<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    use HasFactory;
    protected $fillable =['title','parent_id','cat_descriptions','thumbnail','status','gallery_type'];
}
