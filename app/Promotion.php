<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'end',
        'amount',
        'discount'
    ];
}
