@extends(config("LaravelOwl.extends_template") ?? "LaravelOwl::layouts.master")
@section("content")
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="form">
                        <form action="{{url("carousel/$carouselModel->id/update")}}" method="post">
                            {{csrf_field()}}
                            @include("LaravelOwl::form")

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
