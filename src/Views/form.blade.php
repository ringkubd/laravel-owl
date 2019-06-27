<div class="form-group">
    <label for="carousel_name">Carousel Name</label>
    <input type="text" name="carousel_name" class="form-control @error("carousel_name") error @enderror" id="carousel_name" value="{{$carouselModel->carousel_name}}">
</div>
<div class="form-group">
    <label for="short_code">Short Code</label>
    <input type="text" class="form-control @error("short_code") error @enderror" id="short_code" name="short_code" value="{{$carouselModel->short_code}}">
</div>



