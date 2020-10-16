<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable=['categoryId','subcategoryName','subcategoryDescription','publicationStatus'];

    public function category(){
        return $this->belongsTo(Category::class);
    }


}

