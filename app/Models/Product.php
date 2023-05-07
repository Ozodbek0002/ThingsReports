<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'image',
        'count',
        'category_id',
        'user_id',
        'unit_id',
    ];
}
