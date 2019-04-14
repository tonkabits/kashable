<?php

use Illuminate\Http\Request;
use App\Http\Resources\TableResource;
use App\Table;
use App\Http\Resources\CategoryResource;
use App\Category;
use App\Http\Resources\ItemResource;
use App\Item;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v.01')->group( function()
{
    // this route fetches all tables
    Route::get('/tables', function () 
    {
        return  TableResource::collection(Table::all());
    });

    // ajax request to update and store the position in the database
    Route::post('/tables', 'TableController@update');

    Route::get('/categories' , function ()
    {
        //this will return all categories with their respective items
        return CategoryResource::collection(Category::all());
    });

    Route::get('/items' , function ()
    {
        // this will return all items
        return ItemResource::collection(Item::all());
    });


    
});
