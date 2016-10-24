<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'id',
        'code',
        'name',
        'size',
        'price',
        'qty',
        'expire'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
