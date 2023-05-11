<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'code',
        'image',
        'category_id',
        'room_id',
        'unit_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function room()
    {
        return $this->belongsTo(Room::class);
    }


    public function scopeSearch($query, $val)
    {
        return $query->where('name', 'like', '%' . $val . '%');
    }

    public function scopeSearchCode($query, $val)
    {
        return $query->where('code', 'like', '%' . $val . '%');
    }

    public function scopeSearchCategory($query, $val)
    {
        return $query->where('category_id', 'like', '%' . $val . '%');
    }

    public function scopeSearchUnit($query, $val)
    {
        return $query->where('unit_id', 'like', '%' . $val . '%');
    }



}
