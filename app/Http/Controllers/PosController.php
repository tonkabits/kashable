<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class PosController extends Controller

{

    public function pickTable($id)
    {
        $selectedtable = $id;
        $categories = Category::with('plates')->get();
        $plates = Item::all();

        return view('pos', compact( 'selectedtable' , 'categories' , 'plates'));
    }





    
    //this will get categories and products and fetch the POS view where 
    // we have also the the bill overview


    // this one squacks because the we have no selected table
    // public function fetchItems()
    // {
    //     // this will fetch all categories and their respectives items
    //     $selectedtable = null;
    //     $categories = Category::with('plates')->get();
    //     $plates = Item::all();
        
    //     // DUMPPPPPP IT!!
    //     // dd($items);
    //     return view('pos', compact('selectedtable', 'categories', 'plates'));
    // }
}
