<?php

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);




Route::group(['prefix' => 'user'], function(){

    Route::group(['middleware'=>'guest'], function(){
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup',
        ]);
        
        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup', /* Notice "as" for get and post can be same, i.e. user.signup */
        ]);
        
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin',
        ]);
        
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin', /* Notice "as" for get and post can be same, i.e. user.signup */
        ]);
    });
    
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile',
        ]);
        
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout',
        ]);
    });
});
