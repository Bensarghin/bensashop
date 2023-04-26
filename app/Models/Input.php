<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Input extends Model
{
    use HasFactory;

    protected $fillable = ['name','variant_id'];

    public function variant() 
    {
       return $this->BelongsTo(Variant::class);
    }
}
