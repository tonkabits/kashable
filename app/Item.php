<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //we define that a Item belgongs to a category

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

}
