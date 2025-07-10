<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Relasi ke tabel Products: Satu Kategori bisa punya banyak produk.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
