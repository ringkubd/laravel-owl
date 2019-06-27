<?php

namespace Anwar\Laravelowl\Controllers;

use Anwar\LaravelOwl\Models\OwlCarouselImage;
use Anwar\LaravelOwl\Models\OwlRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwlCarouselController extends Controller
{
    public function index(){
        $carouselList =  OwlRegister::with("CarouselImage")->get();
        $carouselModel = new OwlRegister();
        return view("LaravelOwl::index",compact("carouselList","carouselModel"));
    }

    public function store(Request $req){
        $this->validate($req,[
            "short_code" => "required|unique:owl_register,short_code",
            "carousel_name" => "required"
        ]);
        OwlRegister::create($req->all());
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
