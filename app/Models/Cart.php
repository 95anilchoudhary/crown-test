<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'product_id'
    ];

        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id');
        }
}
