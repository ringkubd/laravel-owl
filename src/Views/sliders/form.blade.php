<div class="form-group">
    {!! Form::label("carousel_id","Carousel") !!}
    {!! Form::select("carousel_id",$carouselList,$_GET['carousel'] ?? null,["class"=>["form-control"]]) !!}
</div>

<div class="form-group">
    {!! Form::label("width") !!}
    {!! Form::text("width",null,["class"=>["form-control"]]) !!}
</div>

<div class="form-group">
    {!! Form::label("height") !!}
    {!! Form::text("height",null,["class"=>["form-control"]]) !!}
</div>

<div class="form-group">
    {!! Form::label("img_title","Text") !!}
    {!! Form::text("img_title",null,["class"=>["form-control"]]) !!}
</div>



<div class="input-group">
    {!! Form::hidden("picture_uri",null,["class"=>["form-control"],"id"=>'thumbnail']) !!}
    <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
    <img id="holder" src="{{asset("vendor/laravelowl/image/no_image.png")}}" style="margin-top:15px;max-height:100px;">
</div>


<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!};

    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";

    $('#lfm').filemanager('image', {prefix: route_prefix});


</script>
