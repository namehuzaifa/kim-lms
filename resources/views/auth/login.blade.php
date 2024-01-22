
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{config('app.name')}} | login</title>
    <x-application-icon/>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/style.css">
    <!-- END: Custom CSS-->
    <style>

        .auth-wrapper {
            min-height: 100vh !important;
        }

        .auth-wrapper.auth-cover .auth-inner {
            height: 100vh !important;
        }


        .img-fluid {
            max-width: 100%;
            height: auto;
            width: 100%;
            height: 95vh;
            object-fit: cover;
            object-position: 100% 31%;
            border-radius: 10px;
        }

        .btn-primary, .btn-primary:active, .btn-primary.active, .btn-primary:focus {
            border-color: #B860F9 !important;
            background-color: #B860F9!important;
            color: #fff !important;
            font-weight: 900;
            font-size: 17px;
            text-transform: uppercase;
        }

        .form-control {
            line-height: 2.45;
            border-radius: 0.757rem;
        }

        .input-group-text {
            border-radius: 0.757rem;
        }
        a span {
            color: #118CFF;
            font-weight: bold;
        }
        .fw-bold{
            font-weight: bold !important;
            color: black;
        }
        .auth-wrapper.auth-cover:before {
            content: '';
            background-image: url("{{asset('/')}}assets/images/login_top.png");
            width: 82px;
            height: 76px;
            position: absolute;
            background-repeat: no-repeat;
            right: 0;
        }

        .auth-wrapper.auth-cover:after {
            content: '';
            background-image: url("{{asset('/')}}assets/images/login_bottom.png");
            width: 81px;
            height: 91px;
            position: absolute;
            background-repeat: no-repeat;
            bottom: 0;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        {{-- <a class="brand-logo" href="{{ route('home')}}"> --}}
                            {{-- <x-application-logo width="10%" /> --}}
                            {{-- <h2 class="brand-text text-primary ms-1">Vuexy</h2> --}}
                        {{-- </a> --}}
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-7 align-items-center p-1" style="background: white;">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-1">
                                <img class="img-fluid" src="{{asset('/')}}assets/images/login_main.png" alt="Login V2" />
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-5 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-10 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Sign In to your Account</h2>
                                <p class="card-text mb-2">Enter your credentials to login to your account</p>
                                <form class="auth-login-form mt-2"  action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-2">
                                        <div class="input-group input-group-merge ">
                                            {{-- <label class="form-label" for="login-email">Email</label> --}}
                                            <span class="input-group-text" id="basic-addon5"> <i data-feather='mail' ></i></span>
                                            <input class="form-control" id="login-email" type="text" name="email" placeholder="john@example.com" value="{{old('email')}}" autofocus="" tabindex="1" />
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-1">
                                        {{-- <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label>
                                        </div> --}}
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <span class="input-group-text" id="basic-addon5"><i data-feather='lock'></i></span>
                                            <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="mb-1 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" name="remember" />
                                            <label class="form-check-label" for="remember-me"> Remember Me</label>
                                        </div>
                                        <a href="{{ route('password.request') }}"><small>Forgot Password?</small></a>
                                    </div>
                                    <button class="btn btn-primary w-100 mt-5 p-2" tabindex="4">Sign in</button>
                                </form>
                                <p class="text-left mt-5"><span>Don’t have an account?</span>
                                    <a href="{{ route('register') }}"><span>&nbsp;Sign Up</span></a>
                                </p>
                                {{-- <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a><a class="btn btn-google" href="#"><i data-feather="mail"></i></a><a class="btn btn-github" href="#"><i data-feather="github"></i></a></div> --}}
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('/')}}app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('/')}}app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('/')}}app-assets/js/core/app-menu.js"></script>
    <script src="{{asset('/')}}app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('/')}}app-assets/js/scripts/pages/auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>




{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
