<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

class TableController extends Controller
{
    // //lets update the position of the tables
    // public function updatePosition($request)
    // {
    //      return [
    //         'top' => $this->top,
    //         'left' => $this->left, 
    //      ];
    // }

    public function update(Request $request)
    {
       dd($request);
    }

}
