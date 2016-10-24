<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    //
    protected $fillable = [
        'id',
        'purchase_id',
        'item_id',
        'qty',
        'price',
        'expire',
        'total'
        
    ];
}
