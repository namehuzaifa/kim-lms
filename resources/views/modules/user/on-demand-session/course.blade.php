
@extends('layouts.master')
@section('title','User List | '.config('app.name'))
@section('style')

     <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/pages/app-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-faq.css">


     <!-- END: Page CSS-->

    <style>

        footer.footer.footer-static.footer-light {
            display: none;
        }

        .faq-search .card-body {
            padding: 4rem !important;
            padding-top: 7rem !important;
        }

        .header-navbar-shadow {
            display: none !important;
        }
        html .content.app-content {
            padding: calc(2rem) 2rem 0;
        }

        .card.ecommerce-card {
            border: 1px solid #cdcccc;
        }
        .ecommerce-application .content-body{
            padding: 30px;
        }


        .card.faq-search:before {
            content: '';
            background-image: url("{{asset('/')}}assets/images/on-demand-session/Vector-top.png");
            width: 82px;
            height: 76px;
            position: absolute;
            background-repeat: no-repeat;
            right: 0;
        }

        body .card.faq-search:after {
            content: '';
            background-image: url("{{asset('/')}}assets/images/on-demand-session/Vector-bottom.png");
            width: 81px;
            height: 91px;
            position: absolute;
            background-repeat: no-repeat;
            top: 340px;
            left: 0px;
        }

        .main-menu{
            overflow: unset;
        }

        body #faq-search-filter .faq-search {
            background-color: #107fe2 !important;
            background-size: unset;
            background-image: url("{{asset('/')}}assets/images/on-demand-session/subject_layer.png");
        }

        ::-webkit-scrollbar-thumb {
            background: #b860f9;
            border-radius: 20px;
        }

        @media (min-width: 1200px){
            nav.header-navbar {
                display: none;

            }
            .faq-search .card-body {
                padding-top: 4rem !important;
            }
            body .card.faq-search:after {
                content: '';
                background-image: url("{{asset('/')}}assets/images/on-demand-session/Vector-bottom.png");
                width: 81px;
                height: 91px;
                position: absolute;
                background-repeat: no-repeat;
                top: 298px;
                left: 80px;
            }
        }
    </style>
@endsection

@section('content')


    <!-- BEGIN: Content-->

    <section id="faq-search-filter">
        <div class="card faq-search">
            <div class="card-body text-center">
                <!-- main title -->
                <img class="mb-3" src="{{ asset('')}}assets/images/on-demand-session/Vector.png" alt="">
                <h2 class="text-light">Let's answer some questions</h2>

                <!-- subtitle -->
                <p class="card-text text-light mb-2">or choose a Course to quickly find the help you need</p>

                <!-- search input -->
                <form class="faq-search-input">
                    <div class="input-group input-group-merge">
                        <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </div>
                        <input type="text" class="form-control" placeholder="Search faq...">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0 card">

            <div class="content-body">

                <h2><b>{{ $subject?->name }}</b></h2>
                <p>Select your desired subject from the sections below</p>
                <!-- Wishlist Starts -->
                <section id="wishlist" class="grid-view wishlist-items">

                    @forelse ($courses as $course)
                        <div class="card ecommerce-card">
                            <div class="item-img text-center">
                                <a href="{{ route('session-detail', $course?->slug) }}">
                                    <img src="{{ asset($course->image_id) }}" class="img-fluid" alt="img-placeholder" />
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    {{-- <div class="item-rating">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        </ul>
                                    </div> --}}
                                    <div class="item-name">
                                        <a class="text-dark" href="{{ route('course-detail', $course?->slug) }}">{{ $course?->title }}</a>
                                    </div>
                                    <div class="item-cost">
                                        <h6 class="item-price">${{ $course?->price_per_session }}</h6>
                                    </div>
                                </div>
                                {{-- <div class="item-name">
                                    <a href="{{ route('course-detail', $course?->slug) }}">{{ $course?->title }}</a>
                                </div> --}}
                                <p class="card-text item-description">
                                    {{ $course?->description }}
                                </p>
                            </div>
                            <div class="item-options text-center">
                                <a href="{{ route('course-detail', $course?->slug) }}" class="btn btn-primary btn-cart">
                                    <span class="add-to-cart">View Details</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <h2>No Session available </h2>
                    @endforelse
                    {{-- <div class="card ecommerce-card">
                        <div class="item-img text-center">
                            <a href="app-ecommerce-details.html">
                                <img src="../../../app-assets/images/pages/eCommerce/1.png" class="img-fluid" alt="img-placeholder" />
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <ul class="unstyled-list list-inline">
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                    </ul>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">$19.99</h6>
                                </div>
                            </div>
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">Apple Watch Series 5</a>
                            </div>
                            <p class="card-text item-description">
                                On Retina display that never sleeps, so it’s easy to see the time and other important information, without
                                raising or tapping the display. New location features, from a built-in compass to current elevation, help users
                                better navigate their day, while international emergency calling1 allows customers to call emergency services
                                directly from Apple Watch in over 150 countries, even without iPhone nearby. Apple Watch Series 5 is available
                                in a wider range of materials, including aluminium, stainless steel, ceramic and an all-new titanium.
                            </p>
                        </div>
                        <div class="item-options text-center">
                            <button type="button" class="btn btn-primary btn-cart">
                                <span class="add-to-cart">View Details</span>
                            </button>
                        </div>
                    </div> --}}


                </section>
                <!-- Wishlist Ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection

@section('scripts')
  <!-- BEGIN: Page JS-->
  <script src="{{ asset('') }}app-assets/js/scripts/pages/app-ecommerce-wishlist.js"></script>
  <!-- END: Page JS-->
@endsection