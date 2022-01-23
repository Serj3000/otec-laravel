<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id', 'id');
    }
}
