<?php




Route::get('token/{token?}',                             ['as' => 'token',          'uses' => 'TokenController@generateToken']);