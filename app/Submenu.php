<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable=['categoryId','subcategoryName','subcategoryDescription','publicationStatus'];

}
