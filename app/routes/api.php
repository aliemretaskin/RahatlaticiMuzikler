<?php

Route::get('token/{token?}',                             ['as' => 'token',          	'uses' => 'TokenController@generateToken']);

Route::group(['middleware' => 'token'], function ()
{

	Route::group(['prefix' => 'favorites', 'as' => 'favorites'], function ()
	{
		Route::get('/',                             	 ['as' => '.list',      		'uses' => 'FavoriteController@list']);
		Route::delete('unlike/{id}',                     ['as' => '.unlike',      		'uses' => 'FavoriteController@unlike']);
		Route::post('like/{id}',                     	 ['as' => '.like',      		'uses' => 'FavoriteController@like']);
	});

	Route::group(['prefix' => 'albums', 'as' => 'albums'], function ()
	{
		Route::get('/',                             	 ['as' => '.list',      		'uses' => 'AlbumController@list']);
		Route::get('/{id}',                         	 ['as' => '.album',      		'uses' => 'AlbumController@album']);
	});

});