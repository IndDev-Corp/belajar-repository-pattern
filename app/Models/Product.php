<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'stock',
        'purchase_price',
        'selling_price',
        'product_category_id',
    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
