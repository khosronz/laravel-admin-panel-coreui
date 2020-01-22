<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attribute
 * @package App\Models
 * @version November 13, 2019, 5:40 am +0330
 *
 * @property string code
 * @property string admin_name
 * @property string type
 * @property string validation
 * @property integer position
 * @property integer is_unique
 * @property integer value_per_locale
 * @property integer value_per_channel
 * @property integer is_filterable
 * @property integer is_configurable
 * @property integer is_user_defined
 * @property integer is_visible_on_front
 * @property integer is_required
 */
class Attribute extends Model
{
    use SoftDeletes;

    public $table = 'attributes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'admin_name',
        'type',
        'validation',
        'position',
        'is_unique',
        'value_per_locale',
        'value_per_channel',
        'is_filterable',
        'is_configurable',
        'is_user_defined',
        'is_visible_on_front',
        'is_required'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'admin_name' => 'string',
        'type' => 'string',
        'validation' => 'string',
        'position' => 'integer',
        'is_unique' => 'integer',
        'value_per_locale' => 'integer',
        'value_per_channel' => 'integer',
        'is_filterable' => 'integer',
        'is_configurable' => 'integer',
        'is_user_defined' => 'integer',
        'is_visible_on_front' => 'integer',
        'is_required' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'admin_name' => 'required',
        'type' => 'required'
    ];

    
}
