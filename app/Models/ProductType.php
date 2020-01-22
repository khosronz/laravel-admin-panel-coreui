<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductType
 * @package App\Models
 * @version December 21, 2019, 3:51 pm +0330
 *
 * @property string title
 * @property string desc
 */
class ProductType extends Model
{
    use SoftDeletes;

    public $table = 'product_types';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
