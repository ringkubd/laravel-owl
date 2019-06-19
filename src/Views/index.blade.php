@extends(config("LaravelOwl.extends_template") ?? "LaravelOwl::layouts.master")
@section("content")
    <div class="container">
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
                        <td><a href="{{url('')}}">Edit</a>|<a href="">Delete</a></td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
