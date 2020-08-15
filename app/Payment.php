<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function orders(){
        return $this->hasMany(Orders::class,'order_id');
    }
}
