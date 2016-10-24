<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable =
        [
            'id',
            'order_id',
            'item_id',
            'qty',
            'price',
            'total'
        ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
