<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //we define that a Category has many  items

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
