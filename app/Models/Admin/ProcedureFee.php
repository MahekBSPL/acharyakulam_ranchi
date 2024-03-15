<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedureFee extends Model
{
    use HasFactory;

    protected $fillable =[
        'description'
    ];
}
