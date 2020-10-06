<?php

//$this->routes();
Route::prefix('it')->group(function() {
    Route::prefix('geo')->group(function() {
        Route::get('/', 'GeoController@index');
    });
});
