<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    // Reverse of One-to-Many: ProductImage belongs to one Product
    public function product()
    {
        return $this->belongsTo(
            Product::class,     // Related model class
            'product_id',       // F.K. in the current table (product_images)
            'id'                // P.K. in the realted table (products)
        );
    }
}
