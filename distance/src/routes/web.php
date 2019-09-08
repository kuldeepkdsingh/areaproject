<?php
    
    Route::group(['namespace' => 'ann\distance\Http\Controllers', 'middleware' => ['web']], function(){
        Route::get('nearestUser', 'DistanceController@index');
    });
    
?>