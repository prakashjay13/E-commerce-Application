<?php

namespace App\Models;

use App\Models\product_attribute;
use App\Models\product_category;
use App\Models\product_image;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productimage;

class Product extends Model
{
    use HasFactory;

    public function ProductAttribute()
    {
        return $this->hasMany(product_attribute::class);
    }

    public function ProductImage()
    {
        return $this->hasMany(product_image::class);
    }

    public function ProductCategory()
    {
        return $this->hasMany(product_category::class);
    }
}
