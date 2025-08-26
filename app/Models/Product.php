<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'category_id',
        'product_code',
        'selling_price',
        'cost_price',
        'quantity',
        'min_quantity',
        'is_active',
    ];

    public static function codeProduct()  {
        $prefix = 'PRD-';
        $maxId = self::max('id');
        $sku = $prefix . str_pad($maxId + 1, 5, '0', STR_PAD_LEFT);
        return $sku;
    }
}
