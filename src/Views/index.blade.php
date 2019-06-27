@extends(config("LaravelOwl.extends_template") ?? "LaravelOwl::layouts.master")
@section("content")
    <style>
        .error{
            border-color: red;
        }

    </style>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                $url = $_GET["url"] ?? url("carousel");
                $button = "Add";
                ?>
                <div class="form-inline">
                    <form action="{!! $url !!}" method="post">
                        {{csrf_field()}}
                        @include("LaravelOwl::form",compact("url","carouselModel","button"))

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="{{$button}}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Carousel Name</th>
                            <th>Short Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($carouselList as $cl)
                            <tr>
                                <td>{{$cl->id}}</td>
                                <td>{{$cl->carousel_name}}</td>
                                <td>{{$cl->short_code}}</td>
                                <td>
                                    <a href="{{url("carousel/slider/create?carousel=$cl->id")}}">Add slide</a> |
                                    <a href="{{url("carousel/slider/$cl->id/show")}}">Sliders</a> |
                                    <a href="{{url("carousel/$cl->id/edit")}}">Edit</a> |
                                    <form action="{{url("carousel/$cl->id/delete")}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field("delete")}}
                                        <input type="submit" class="btn btn-sm" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            document.getElementById("carousel_name").addEventListener("change",function () {
                document.getElementById("short_code").value = this.value.replace(/\s/g,"_").toLowerCase();
            })
        }
    </script>
@endsection
