<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $connection = 'shared'; // Sử dụng connection shared với prefix wh_
    protected $table = "customers"; // Tên bảng không prefix

    protected $fillable = ['user_id', 'name', 'address', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
