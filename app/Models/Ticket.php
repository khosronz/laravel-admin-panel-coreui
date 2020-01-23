<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ticket
 * @package App\Models
 * @version November 12, 2019, 5:14 am +0330
 *
 * @property \App\Models\Severity severity
 * @property \App\Models\Organization organization
 * @property \App\Models\User user
 * @property string title
 * @property string status
 * @property integer severity_id
 * @property integer organization_id
 * @property integer user_id
 * @property string desc
 */
class Ticket extends Model
{
    use SoftDeletes;

    public $table = 'tickets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'status',
        'severity_id',
        'organization_id',
        'user_id',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'status' => 'string',
        'severity_id' => 'integer',
        'organization_id' => 'integer',
        'user_id' => 'integer',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function severity()
    {
        return $this->belongsTo(\App\Models\Severity::class, 'severity_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo(\App\Models\Organization::class, 'organization_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function messages()
    {
        return $this->hasMany('App\Models\Message','ticket_id','id');
    }
}
