<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations; // ✅ أضف HasFactory هنا

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount_price',
        'image',
        'slug',
        'category_id'
    ];

    public $translatable = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function weights()
    {
        return $this->hasMany(ProductWeight::class);
    }
}
