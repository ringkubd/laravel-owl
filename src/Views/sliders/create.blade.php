@extends(config("LaravelOwl.extends_template") ?? "LaravelOwl::layouts.master")
@section("content")
    <style>
        .error{
            border-color: red;
        }

    </style>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    {!! Form::model($model) !!}
                    @include("LaravelOwl::sliders.form")
                    <input type="submit" value="Submit" class="btn btn-success">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
