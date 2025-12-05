<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'details', 'category_id', 'image'];

    // Relation avec Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
