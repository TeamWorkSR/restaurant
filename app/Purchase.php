<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable =
        [
            'id',
            'purchaseDate',
            'supplyer_id',
            'user_id',
            'invoice',
            
        ];
}
