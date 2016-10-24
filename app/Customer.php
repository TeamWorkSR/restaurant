<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'sex',
        'address',
        'tel',
        'email'
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
