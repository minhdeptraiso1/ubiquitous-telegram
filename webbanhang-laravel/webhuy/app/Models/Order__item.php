<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order__Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'quanty',
        'price',
        'total_price',
    ];
    protected $table = 'order__items';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
