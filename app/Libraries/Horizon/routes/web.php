<?php 

// Route::get('{view?}', 'HorizonController@index')->where('view', '(?!(/api)).*')->name('horizon.index');
Route::get(config('horizon.path').'{view?}', 'HorizonController@index')->where('view', '(?!(/api)).*')->name('horizon.index');
