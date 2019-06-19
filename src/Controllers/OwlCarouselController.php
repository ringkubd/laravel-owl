<?php

namespace Anwar\Laravelowl\Controllers;

use Anwar\LaravelOwl\Models\OwlRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwlCarouselController extends Controller
{
    public function index(){
        $carouselList =  OwlRegister::with("CarouselImage")->get();
        return view("LaravelOwl::index",compact("carouselList"));
    }
}
