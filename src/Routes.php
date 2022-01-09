<?php
Route::group(['middleware' => 'web'], function () {

    /**
     *  Slider
     *
     */
    Route::prefix("carousel")->group(function (){

        Route::get("/", "Anwar\LaravelOwl\Controllers\OwlCarouselController@index");
        Route::get("/{id}/edit", "Anwar\LaravelOwl\Controllers\OwlCarouselController@edit");
        Route::post("/{id}/update", "Anwar\LaravelOwl\Controllers\OwlCarouselController@update");
        Route::delete("/{id}/delete", "Anwar\LaravelOwl\Controllers\OwlCarouselController@delete");
        Route::post("/", "Anwar\LaravelOwl\Controllers\OwlCarouselController@store");

        Route::get("/slider/{id}/show","Anwar\LaravelOwl\Controllers\OwlCarouselController@sliderList");
        Route::get("/slider/create","Anwar\LaravelOwl\Controllers\OwlCarouselSliderController@create");
        Route::post("/slider/create","Anwar\LaravelOwl\Controllers\OwlCarouselSliderController@store");
    });

});
