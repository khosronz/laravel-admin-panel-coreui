<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductFeatures
 * @package App\Models
 * @version January 21, 2020, 4:14 pm +0330
 *
 * @property \App\Models\Product product
 * @property string title
 * @property string price
 * @property integer product_id
 * @property string desc
 */
class ProductFeatures extends Model
{
    use SoftDeletes;

    public $table = 'product_features';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'price',
        'product_id',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'price' => 'string',
        'product_id' => 'integer',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'price' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }
}
