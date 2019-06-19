<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Anwar Jahid">
    <meta name="application-name" content="Vocational Project">
    <meta name="description" content="@yield("description")">

    <title>@yield('title') | {{env("APP_NAME")}}</title>

    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}" type="image/x-icon" />

    {{-- include common style file --}}
    @include('admin.inc.style')

    {{-- generate custom-style file --}}
    @yield('style')

    {{-- include custom js file --}}
    @include('admin.inc.script')


</head>

<body class="hold-transition skin-blue sidebar-mini">
{{-- include Message --}}
@include('admin.inc.messages')
