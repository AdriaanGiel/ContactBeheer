<?php
/**
 * Web routes
 */
Route::group(['middleware' => ['web']],function(){
    Route::auth();
    Route::get('/home', 'HomeController@index');
    /**
     * Front routes
     */
    Route::group(['middleware' => ['auth'], 'namespace' => 'Web\Front'],function(){
        Route::get('/','ContactController@index');

        Route::resource('contact', 'ContactController',['except' => ['store', 'update', 'destroy']]);
        Route::resource('contact.address','AddressController',['except' => ['store', 'update', 'destroy']]);
        Route::resource('contact.email','EmailController',['except' => ['store', 'update', 'destroy']]);
        Route::resource('contact.phonenumber','PhonenumberController',['except' => ['store', 'update', 'destroy']]);
        Route::resource('contact.banknumber','BanknumberController',['except' => ['store', 'update', 'destroy']]);

        /**
         * FILTER THROUGH AJAX REQUEST
         */
        Route::get('contact/filter/{id}','ContactController@filter');
    });

    Route::group(['middleware' => ['api'], 'namespace' => 'Api\Front'],function(){
        Route::resource('contact', 'ContactController',['only' => ['store', 'update', 'destroy']]);
        Route::resource('contact.address','AddressController',['only' => ['store', 'update', 'destroy']]);
        Route::resource('contact.email','EmailController',['only' => ['store', 'update', 'destroy']]);
        Route::resource('contact.phonenumber','PhonenumberController',['only' => ['store', 'update', 'destroy']]);
        Route::resource('contact.banknumber','BanknumberController',['only' => ['store', 'update', 'destroy']]);
    });


    /***
     * Admin Routes
     */
    Route::group(['middleware' => ['auth','admin'], 'namespace' => 'Web\admin','prefix' => 'admin'],function(){
        Route::resource('account','UserController',['except' => ['store', 'update', 'destroy']]);
        Route::resource('account.contact','ContactController',['except' => ['store', 'update', 'destroy']]);
    });

    Route::group(['middleware' => ['api'], 'namespace' => 'Api\admin','prefix' => 'admin'],function(){
        Route::resource('account','UserController',['only' => ['store', 'update', 'destroy']]);
    });




});

//Route::group(['middleware' => ['web','api'],'namespace' => 'Api\Front'],function(){
//
//});
//
//
//
//Route::group(['middleware' => ['web','auth','admin'], 'namespace' => 'Web\Admin','prefix' => 'admin'],function(){
//
//});
//
//Route::group(['middleware' => ['web','api','admin'],'namespace' => 'Api\Admin','prefix' => 'admin'],function(){
//
//});
//
///**
// * Login Routes
// */
//Route::group(['middleware' => ['web']],function(){
//    Route::auth();
//    Route::get('/home', 'HomeController@index');
//});
//
///**
// * Api Routes
// */


