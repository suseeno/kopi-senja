<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name',
        'code',
        'type',
        'validation',
        'is_required',
        'is_unique',
        'is_filterable',
        'configurable',
    ];

    public static function types()
    {
        return [
            'text' => 'Text',
            'textarea' => 'Textarea',
            'price' => 'Price',
            'boolean' => 'Boolean',
            'select' => 'Select',
            'datetime' => 'Datetime',
            'date' => 'date',
        ];
    }
    public static function booleanOptions()
    {
        return [
            1 => 'Yes',
            0 => 'No',
        ];
    }
    public static function validations()
    {
        return [
            'number' => 'Number',
            'decimal' => 'Decimal',
            'email' => 'Email',
            'url' => 'Url',
        ];
    }
    public function attributesOptions()
    {
        return $this->hasMany('App\Models\AttributesOption');
    }
}
