<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AttributeProductMapping
 * @package App\Models
 * @version November 14, 2019, 4:05 am +0330
 *
 * @property \App\Models\Product product
 * @property \App\Models\Attribute attribute
 * @property integer product_id
 * @property integer attribute_id
 */
class AttributeProductMapping extends Model
{
    use SoftDeletes;

    public $table = 'attribute_product_mappings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'product_id',
        'attribute_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'attribute_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id',
        'attribute_mapping'
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
