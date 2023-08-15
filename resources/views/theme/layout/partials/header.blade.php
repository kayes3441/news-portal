<!-- Topbar Start -->
<div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Tranding</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                        @foreach ($trending_news as $trending)
                        <div class="text-truncate">
                                <a class="text-secondary" href="">{{$trending->news->title}}</a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                {{\Carbon\Carbon::now()->format('D , M d ,Y')}}
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="{{route('home')}}" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('contact-us')}}" class="nav-item nav-link">Contact</a>
                </div>
                <form action="{{route('all-news')}}" method="get">
                    @csrf
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                        <input name="data_from" value="search" hidden>
                        <input type="text" class="form-control" name="search" value="{{request('search')}}" placeholder="Keyword">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text text-secondary"><i
                                    class="fa fa-search"></i></button>
                        </div>

                </div>
            </form>

                @if(auth('users')->check())
                <div class="nav-item dropdown show">
                    <a href="javascript:" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-user">
                        </i>
                        <span>{{auth('users')->user()->f_name}}</span>
                    </a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="{{route('saved-news-list')}}" class="dropdown-item">Saved News</a>
                        <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                    </div>
                </div>
                @else
                <div class="navbar-nav mx-3">
                    <a href="javascript:" class="nav-item nav-link" data-bs-target="#log_in" data-bs-toggle="modal">
                       Sign In
                    </a>
                </div>
                @endif
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Sign In Modal -->
    <div class="modal fade" id="log_in" aria-hidden="true" aria-labelledby="log_in_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Log In</h5>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('login')}}" method="post" id="login_form">
                        @csrf
                        <div class="control-group">
                            <input type="email" class="form-control"  name="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                        </div>
                        <div class="control-group mt-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                        </div>
                        <div class="text-dark m-2 p-2 text-center d-flex">
                            <p class="mx-2">Enjoy New Experience</p>
                            <a href="javascript:" class="" data-bs-dismiss="modal"  data-bs-target="#register"  data-bs-toggle="modal">
                                Sign Up
                            </a>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-outline-dark">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="register" aria-hidden="true" aria-labelledby="log_in_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Registration</h5>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
                <form action="{{route('registration')}}" method="post" id="registration_form">
                    @csrf
                    <div class="modal-body">
                        <div class="control-group">
                            <input type="text" class="form-control" name="f_name" placeholder="First Name" required="required" data-validation-required-message="Please enter your First Name" aria-invalid="false">
                        </div>
                        <div class="control-group mt-3">
                            <input type="text" class="form-control" name="l_name" placeholder="Last Name" required="required" data-validation-required-message="Please enter your Last Name" aria-invalid="false">
                        </div>
                        <div class="control-group mt-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                        </div>
                        <div class="control-group mt-3">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" onkeyup="passowrd()" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                            <span class="passoword mt-1"></span>
                        </div>
                        <div class="control-group mt-3">
                            <input type="password" class="form-control" placeholder="Confirm Passowrd" id="confirm_password" onkeyup="passowrd_match()" name="confirm_password" required="required" data-validation-required-message="Please enter your email" aria-invalid="false">
                            <span class="match_passoword mt-1"></span>
                        </div>
                        <div class="text-dark m-2 p-2 text-center d-flex">
                            <p class="mx-2">Already Registered</p>
                            <a href="javascript:" class="" data-bs-dismiss="modal"  data-bs-target="#log_in"  data-bs-toggle="modal">
                                Sign In
                            </a>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-outline-dark" >Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('script')
    <script>
        function passowrd(){
            let length_password = document.getElementById('password').value.length;
            if(length_password<8){
                $('.passoword').addClass('text-danger')
                $('.passoword').empty().html('Password Must 7 + Character');
            }
            else{
                $('.passoword').addClass('d-none');
            }
        }
        function passowrd_match(){
            let password = document.getElementById('password').value;
            let confirm_password = document.getElementById('confirm_password').value;
            if(confirm_password.length == null){
                $('.match_passoword').addClass('d-none')
            }else{
                $('.match_passoword').removeClass('d-none')
            }
            if(password == confirm_password){
                $('.match_passoword').addClass('text-success')
                $('.match_passoword').removeClass('text-danger')
                $('.match_passoword').empty().html('Password Match');
            }else{
                $('.match_passoword').removeClass('text-success')
                $('.match_passoword').addClass('text-danger')
                $('.match_passoword').empty().html('Password Not Match');
            }
        }
    </script>
@endpush
