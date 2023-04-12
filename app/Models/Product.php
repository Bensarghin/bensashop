<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'slug', 'compare_price', 'description', 'visible', 'category_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function images()
    {
        return $this->hasMany(Image::class,'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
