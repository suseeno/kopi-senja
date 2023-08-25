<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'sku',
        'name',
        'slug',
        'height',
        'length',
        'price',
        'width',
        'weight',
        'status',
        'short_description',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(
            'App\Models\Category',
            'product_categories'
        );
    }

    public static function statuses()
    {
        return [
            0 => 'draft',
            1 => 'active',
            2 => 'InActive',
        ];
    }
}
