<?php

namespace Anwar\LaravelOwl\Models;

use Illuminate\Database\Eloquent\Model;

class OwlCarouselImage extends Model
{

    protected $table = "laravelowl_pictures";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'carousel_id','picture_uri','height','img_title','width'
    ];


    public function carousel(){
        return $this->belongsTo(OwlRegister::class);
    }

}
