<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // One-to-Many: One Product has many ProductImage(s)
    public function images()
    {
        return $this->hasMany(
            ProductImage::class,    // Related Model class name
            'product_id',           // F.k. in the realted table (product_images)
            'id'                    // P.K in the current table (products)
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Many-to-Many: Product belongs to many tags and tags blongs to many products
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,     // Realted model
            'product_tag',  // Pivot table
            'product_id',   // F.K. for current model in pivot table
            'tag_id',       // F.K. for ralted model in pivot table
            'id',           // P.K. in current model
            'id'            // P.K. in related model
        );
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function reviewers()
    {
        return $this->belongsToMany(
            User::class,
            'reviews',
            'product_id',
            'user_id',
            'id',
            'id'
        )->using(Review::class);
    }
}
