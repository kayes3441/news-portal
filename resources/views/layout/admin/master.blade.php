<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title') </title>
    @include('admin.include.style')
</head>

<body data-sidebar="dark" data-layout-mode="light">
<div id="layout-wrapper">
   @include('admin.include.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.include.left_sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">@yield('doc-title')</h4>
                        </div>
                    </div>
                </div>

                @yield('body')
            </div>
            <!-- container-fluid -->
        </div>
        @include('admin.include.footer')
    </div>
    <!-- end main content-->

</div>


@include('admin.include.script')


</body>

</html>
