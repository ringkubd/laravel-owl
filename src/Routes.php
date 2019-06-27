<?php
Route::group(['middleware' => 'web'], function () {

    /**
     *  Slider
     *
     */
    Route::prefix("carousel")->group(function (){

        Route::get("/", "Anwar\Laravelowl\Controllers\OwlCarouselController@index");
        Route::get("/{id}/edit", "Anwar\Laravelowl\Controllers\OwlCarouselController@edit");
        Route::post("/{id}/update", "Anwar\Laravelowl\Controllers\OwlCarouselController@update");
        Route::delete("/{id}/delete", "Anwar\Laravelowl\Controllers\OwlCarouselController@delete");
        Route::post("/", "Anwar\Laravelowl\Controllers\OwlCarouselController@store");

        Route::get("/slider/{id}/show","Anwar\Laravelowl\Controllers\OwlCarouselController@sliderList");
        Route::get("/slider/create","Anwar\Laravelowl\Controllers\OwlCarouselSliderController@create");
        Route::post("/slider/create","Anwar\Laravelowl\Controllers\OwlCarouselSliderController@store");
    });

});
