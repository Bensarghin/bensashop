<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['label'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'variants_products');
    }

    public function inputs() 
    {
        return $this->hasMany(Input::class);
    }
}
