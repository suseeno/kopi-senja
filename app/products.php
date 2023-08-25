<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'user_id',
        'sku',
        'name',
        'height',
        'lenght',
        'slug',
        'price',
        'width',
        'weight',
        'status',
        'short_description',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category');
    }
    public function status()
    {
        return [
            0 => 'draft',
            1 => 'active',
            2 => 'InActive',
        ];
    }
}
