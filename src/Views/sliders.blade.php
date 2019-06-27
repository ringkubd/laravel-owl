@extends(config("LaravelOwl.extends_template") ?? "LaravelOwl::layouts.master")
@section("content")
    <style>
        .error{
            border-color: red;
        }

    </style>
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div style="position: relative">
                        <h2>SLiders</h2>
                        <span class="btn btn-primary" style="position: absolute; top: 20%; right: 10%">Add</span>
                    </div>

                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl#</th>
                            <th>Carousel Slide</th>
                            <th>Carousel Text</th>
                            <th>Dimension</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sliders as $sl)
                            <tr>
                                <td>{!! $sl->id !!}</td>
                                <td><img width="10%" src="{!! $sl->picture_uri !!}" alt=""></td>
                                <td>{!! $sl->overlay_text !!}</td>
                                <td>{!! $sl->dimension !!}</td>
                                <td></td>
                            </tr>
                        @empty
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
