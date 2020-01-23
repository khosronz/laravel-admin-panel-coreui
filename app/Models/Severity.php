<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Severity
 * @package App\Models
 * @version November 11, 2019, 4:47 pm +0330
 *
 * @property string title
 * @property string desc
 */
class Severity extends Model
{
    use SoftDeletes;

    public $table = 'severities';
    

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
