<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    /**
     * Primary key
     * @var string
     */
    protected $primaryKey = 'codigo';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'codigo',
        'nombre_producto',
        'cant',
        'price',
        'tax',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'nombre_producto' => 'string',
        'cant' => 'integer',
        'price' => 'decimal:2',
        'tax' => 'decimal:2',
        'user_id' => 'integer',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user'];

    // RELACIONES
    /**
     * Get user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
