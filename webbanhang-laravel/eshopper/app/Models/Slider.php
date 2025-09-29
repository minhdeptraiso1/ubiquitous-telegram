<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import trait SoftDeletes

class Slider extends Model
{
    use SoftDeletes; // Sử dụng trait SoftDeletes
    
    protected $connection = 'shared'; // Sử dụng connection shared với prefix wh_
    protected $table = "sliders"; // Sử dụng bảng sliders chung
}
