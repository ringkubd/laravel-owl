<?php

namespace Anwar\LaravelOwl\Models;

use Illuminate\Database\Eloquent\Model;

class OwlRegister extends Model
{

    protected $table = "owl_register";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'carousel_name','short_code'
    ];


    public function CarouselImage(){
        return $this->hasMany(OwlCarouselImage::class,"carousel_id","id");
    }

}
