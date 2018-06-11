<?php

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/signup', [
    'uses' => 'UserController@getSignup',
    'as' => 'user.signup'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup' /* Notice "as" for get and post can be same, i.e. user.signup */
]);

Route::get('/signin', [
    'uses' => 'UserController@getSignin',
    'as' => 'user.signin'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignin',
    'as' => 'user.signin' /* Notice "as" for get and post can be same, i.e. user.signup */
]);