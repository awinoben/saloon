<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    //
    protected $fillable = [
        'name', 'phone', 'paybill_no', 'user_id',
    ];
}
