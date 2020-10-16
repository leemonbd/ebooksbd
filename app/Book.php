<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function orderDetails()
    {
        return $this->belongsToMany(OrderDetails::class, 'books');
    }



}
