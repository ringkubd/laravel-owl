{{-- include header file --}}

@include('admin.inc.header')


<div class="wrapper">
    {{-- include navbar file --}}
    @include('admin.inc.navbar')


    {{-- include leftsidebar file --}}
    @include('admin.inc.left-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="app">
        <section class="content-header">
            <h1>
                <button onclick="window.history.back()" class="btn btn-sm btn-linkedin" title="Go to previous page">
                    <i class="fa fa-arrow-left"></i>
                </button>
                <button onclick="window.history.forward()" class="btn btn-sm btn-linkedin" title="Go to next page">
                    <i class="fa fa-arrow-right"></i>
                </button>
                @yield('page-title')
            </h1>

            @yield('breadcrumb')

        </section>
        {{-- Content Header (Page header) --}}
        @yield('content-header')

        {{-- Main content --}}
        @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            version: 1.0.0
        </div>
        <!-- Default to the left -->
        <strong>Developed by <a href="https:/anwarjahid.com/" target="_blank" title="www.anwarjahid.com/">Anwar</a>.</strong> All rights reserved.
    </footer>


    {{-- include rightsidebar file --}}
    @include('admin.inc.right-sidebar')


</div>
<!-- ./wrapper -->



{{-- include footer --}}
@include('admin.inc.footer')
