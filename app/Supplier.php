<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'sex',
        'deport',
        'tel',
        'email',
        'address'
    ];
}
