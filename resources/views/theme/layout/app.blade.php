<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <link rel="shortcut icon" href="{{asset('public/admin/assets/images/favicon.ico')}}">
    <link href="{{asset('public/admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('public/admin/assets/plugins/sweet_alert/sweetalert2.css') }}">

    <link href="{{asset('public/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/theme/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    @yield('css')
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/theme/assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('public/theme/assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/toastr.css')}}">

</head>

<body>
    @include('theme.layout.partials.header')

    @yield('content')

    @include('theme.layout.partials.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->

    <script src="{{asset('public/admin/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/theme/assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/theme/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('public/theme/assets/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('publlic/theme/assets/mail/contact.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/toastr.js')}}"></script>
    <script src="{{asset('public/admin/assets/plugins/sweet_alert/sweetalert2.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{asset('public/theme/assets/js/main.js')}}"></script>

    @yield('script')

<script>
    function route_alert(route, message) {
        Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#c71d1d',
        cancelButtonColor: '#000',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                location.href = route;
            }
        })

    }
    @if(Session::has('message.success'))
    let success_message = "{{ Session::get('message.success') }}";
        Command: toastr["success"](success_message);
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    @endif
    @if(Session::has('message.info'))
    let success_message = "{{ Session::get('message.info') }}";
        Command: toastr["info"](success_message);
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    @endif
    @if(Session::has('message.wranning'))
    let success_message = "{{ Session::get('message.wranning') }}";
        Command: toastr["warning"](success_message);
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            Command: toastr["error"]("Failed !!","{{$error}}")
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        @endforeach
    @endif

</script>




</body>

</html>
