<?php

namespace Anwar\Laravelowl\Controllers;

use Anwar\LaravelOwl\Models\OwlCarouselImage;
use Anwar\LaravelOwl\Models\OwlRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwlCarouselSliderController extends Controller
{
    public function create(){
        $model = new OwlCarouselImage();
        $carouselList = OwlRegister::pluck("carousel_name",'id');

        return view("LaravelOwl::sliders.create",compact('model','carouselList'));
    }



    public function store(Request $req){
        $this->validate($req,[
            "carousel_id" => "required",
            "carousel_id" => "required"
        ]);
        OwlCarouselImage::create($req->all());
        return back();
    }

    public function edit($id){
        $carouselModel = OwlRegister::find($id);
        return view('LaravelOwl::edit',compact('carouselModel'));
    }

    public function update(Request $request, $id){
        OwlRegister::find($id)->update($request->all());
        return redirect("carousel")->with('success','Successfully updated');;
    }

    public function delete($id){
        //OwlRegister
        OwlRegister::find($id)->delete();
        return redirect("carousel")->with('success','Successfully deleted');;


    }
}
