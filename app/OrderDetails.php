<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public function books()
    {
        return $this->belongsToMany(Book::class, 'order_details');
    }


}
