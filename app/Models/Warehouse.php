<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    const PANT_FABRIC_ONE = 1.4;
    const SHIRT_FABRIC_ONE = 0.8;
    const THREAD_ONE = 10;
    const SHIRT_BUTTON_ONE = 5;

    protected $table = 'warehouses';
    protected $fillable = ['material_name', 'remain', 'price'];
}
