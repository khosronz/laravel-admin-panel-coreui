<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductRelation
 * @package App\Models
 * @version November 13, 2019, 4:02 am +0330
 *
 * @property \App\Models\Product parent
 * @property \App\Models\Product child
 * @property integer parent_id
 * @property integer child_id
 */
class ProductRelation extends Model
{
    use SoftDeletes;

    public $table = 'product_relations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'parent_id',
        'child_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'parent_id' => 'integer',
        'child_id' => 'integer'
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
    public function parent()
    {
        return $this->belongsTo(\App\Models\Product::class, 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function child()
    {
        return $this->belongsTo(\App\Models\Product::class, 'child_id', 'id');
    }
}
