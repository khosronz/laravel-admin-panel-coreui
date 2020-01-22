<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetail
 * @package App\Models
 * @version November 11, 2019, 8:33 pm +0330
 *
 * @property \App\Models\User user
 * @property \App\Models\Product product
 * @property \App\Models\Order order
 * @property integer user_id
 * @property integer product_id
 * @property integer order_id
 * @property string dns
 * @property string ip
 * @property string dns_ip_status
 * @property string status
 * @property string start_time
 * @property string end_time
 */
class OrderDetail extends Model
{
    use SoftDeletes;

    public $table = 'order_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'dns',
        'ip',
        'dns_ip_status',
        'status',
        'start_time',
        'end_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'product_id' => 'integer',
        'order_id' => 'integer',
        'dns' => 'string',
        'ip' => 'string',
        'dns_ip_status' => 'string',
        'status' => 'string',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dns' => 'required',
        'ip' => 'required',
        'dns_ip_status' => 'required',
        'status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

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
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }
}
