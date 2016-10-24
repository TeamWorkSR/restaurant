<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'id',
        'user_id',
        'customer_id',
        'table_id',
        'order_date',
        'discount'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function table()
    {
        return $this->belongsTo('App\Table');
    }

    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
