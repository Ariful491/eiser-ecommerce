<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function orders(){
        return $this->hasMany(Orders::class);
    }
}
