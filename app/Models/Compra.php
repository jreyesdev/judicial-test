<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user', 'product'];

    // RELACIONES
    /**
     * Get user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
