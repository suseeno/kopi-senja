<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributesOption extends Model
{
    protected $fillable = ['attributes_id', 'name'];

    public function attributes()
    {
        return $this->belongsTo('App\Models\Attribute');
    }
}
