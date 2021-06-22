<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $connection = 'mysql';

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'name', 'slug', 'parent_id', 'description', 'status', 'image_path',
    ];

    // get...Attribute
    // $model->image_url
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            //return asset('storage/' . $this->image_path);
            return Storage::disk('public')->url($this->image_path);
        }
        return 'https://via.placeholder.com/200x200.png?text=No+Image';
    }

    // 
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id','id');
    }

}
