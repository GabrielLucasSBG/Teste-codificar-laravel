<?php
Route::get('/', 'ContactController@index')->name('/');

Route::resource('contacts', 'ContactController');