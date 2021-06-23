<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function reviewedProducts()
    {
        return $this->belongsToMany(
            Product::class,
            'reviews',
            'user_id',
            'product_id',
            'id',
            'id'
        )->using(Review::class);
    }

    // One-to-One: User has one profile
    public function profile()
    {
        return $this->hasOne(
            Profile::class,
            'user_id',
            'id'
        )->withDefault();
    }
}
