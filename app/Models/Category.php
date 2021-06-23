<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->withDefault([
            'name' => 'No Parent'
        ]);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

}
