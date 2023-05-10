<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'from_user_id',
        'to_user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function from_user()
    {
        return $this->belongsTo(User::class,'from_user_id');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class,'to_user_id');
    }
}
