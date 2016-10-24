<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'status',
        'temp_order_id'
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
