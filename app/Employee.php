<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'phone_number', 'password', 'salon_id', 'employer_id'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
