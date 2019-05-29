<?php




Route::get('token/{token?}',                             	 ['as' => 'token',          'uses' => 'TokenController@generateToken']);

Route::group(['middleware' => 'token'], function ()
{


	Route::group(['prefix' => 'favorites', 'as' => 'favorites'], function ()
	{
		Route::get('/',                             	 ['as' => '.list',      		'uses' => 'FavoriteController@list']);
		Route::delete('unlike/{id}',                     ['as' => '.unlike',      		'uses' => 'FavoriteController@unlike']);
	});




});