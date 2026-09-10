<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

//CSRF Protection (Cross Site Request Forgery)
 
    // Route::get($uri, $callback);

    // Route::post($uri, $callback);

    // Route::put($uri, $callback);

    // Route::patch($uri, $callback);

    // Route::delete($uri, $callback);

    // Route::options($uri, $callback);


    Route::match(['get', 'post'], '/', function () {  
    //  

    });

    Route::any('/about', function ()   
    {  
    // 
    });

    Route::get('/page', function () {
        return "<h1>User List</h1>";
    });


//Laravel Routing Parameters
    Route::get('/user/{id}', function ($id) {
        return "User ID: " . $id;
    });

//Optional Parameters
    Route::get('/users/{id?}', function ($id = null) {
        return "User ID: " . $id;
    });



