<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['categoryName','categoryDescription','publicationStatus'];

    public function subcategories(){
        return $this->hasMany(Subcategory::class,'categoryId', 'id')->where('publicationStatus',1);
    }
}
