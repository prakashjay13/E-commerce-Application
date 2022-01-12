<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_attribute extends Model
{
    use HasFactory;

    public function product_attribute()
    {
        return $this->belongsTo(Product::class);
    }
}
