<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function payments(){
        return $this->belongsTo(Payment::class,'id');
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
}
