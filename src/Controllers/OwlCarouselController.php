<?php

namespace Anwar\Laravelowl\Controllers;

use Anwar\LaravelOwl\Models\OwlCarouselImage;
use Anwar\LaravelOwl\Models\OwlRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwlCarouselController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $carouselList =  OwlRegister::with("CarouselImage")->get();
        $carouselModel = new OwlRegister();

        return view("LaravelOwl::index",compact("carouselList","carouselModel"));
    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $req){
        $this->validate($req,[
            "short_code" => "required|unique:owl_register,short_code",
            "carousel_name" => "required"
        ]);
        OwlRegister::create($req->all());
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id){
        $carouselModel = OwlRegister::find($id);
        return view('LaravelOwl::edit',compact('carouselModel'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update(Request $request, $id){
        OwlRegister::find($id)->update($request->all());
        return redirect("carousel")->with('success','Successfully updated');;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id){
        //OwlRegister
        OwlRegister::find($id)->delete();
        OwlCarouselImage::where("carousel_id",$id)->delete();
        return redirect("carousel")->with('success','Successfully deleted');;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function sliderList($id){
       $sliders = OwlCarouselImage::whereCarousel_id($id)->get();
       return view('LaravelOwl::sliders',compact('sliders'));
    }
}
