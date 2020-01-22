<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AttributeProductValue
 * @package App\Models
 * @version November 13, 2019, 5:41 am +0330
 *
 * @property \App\Models\Product product
 * @property \App\Models\Attribute attribute
 * @property string text_value
 * @property integer boolean_value
 * @property integer integer_value
 * @property number float_value
 * @property string|\Carbon\Carbon datetime_value
 * @property string|\Carbon\Carbon date_value
 * @property string json_value
 * @property integer product_id
 * @property integer attribute_id
 */
class AttributeProductValue extends Model
{
    use SoftDeletes;

    public $table = 'attribute_product_values';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'text_value',
        'boolean_value',
        'integer_value',
        'float_value',
        'datetime_value',
        'date_value',
        'json_value',
        'product_id',
        'attribute_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'text_value' => 'string',
        'boolean_value' => 'integer',
        'integer_value' => 'integer',
        'float_value' => 'double',
        'datetime_value' => 'datetime',
        'date_value' => 'datetime',
        'product_id' => 'integer',
        'attribute_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function attribute()
    {
        return $this->belongsTo(\App\Models\Attribute::class, 'attribute_id', 'id');
    }
}
