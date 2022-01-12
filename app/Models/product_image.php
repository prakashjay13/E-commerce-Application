<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    use HasFactory;

    public function product_image()
    {
        return $this->belongsTo(Product::class);
    }
}
