@extends(themeView('partials.layout'))

@section('title')
    {{ 'About us' }}
@endsection
@section('description')
    {{ 'description' }}
@endsection
@section('keywords')
    {{ 'keywords' }}
@endsection
@section('og_image')
@endsection
@section('twitter_image')
@endsection

@section('content')
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">About Us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="about-section-three pb-60">
        <div class="bg bg-pattern-2"></div>
        <div class="auto-container">
            <div class="row">
                <div class="image-column col-xl-5">
                    <div class="inner-column wow fadeInLeft">
                        <figure class="image-1 overlay-anim wow fadeInUp">
                            <div class="call-anytime-box">
                                <div class="icon-box"><i class="fa fa-phone"></i></div>
                                <div class="number">
                                    <p class="mb-0">Call Anytime</p>
                                    <h5 class="m-0">92 000 666 8888</h5>
                                </div>
                            </div>
                            <div class="background-layer"></div>
                            <img src="{{ asset('/uploads/img/about2-1.jpg') }}" alt />
                        </figure>
                        <figure class="image-2 overlay-anim wow fadeInUp">
                            <img src="{{ asset('/uploads/img/about2-2.jpg') }}" alt />
                        </figure>
                    </div>
                </div>
                <div class="content-column col-xl-6 ml-60 ml-lg--0 wow fadeInLeft" data-wow-delay="300ms">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title">About Cooltech</span>
                            <h2>
                                Heating & AC Installation <br />
                                Repair Company
                            </h2>
                            <div class="text mt-30">
                                There are many of Ipsum but the have Aliq is notm hendr erit
                                a augue insu image pellen simply free text ipsum is simply
                                service has been the text ever since service in magna
                            </div>
                            <div class="row mt-40">
                                <div class="about-block-two col-md-6">
                                    <div class="inner d-flex align-items-center">
                                        <i class="icon flaticon-ac1-split"></i>
                                        <h5 class="title ms-4 mb-2">
                                            Expert Team <br class="d-none d-xl-block" />
                                            Members
                                        </h5>
                                    </div>
                                </div>
                                <div class="about-block-two col-md-6">
                                    <div class="inner d-flex align-items-center">
                                        <i class="icon flaticon-ac1-freeze-1"></i>
                                        <h5 class="title ms-4 mb-2">
                                            Safe Solution For <br class="d-none d-xl-block" />
                                            Home
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="text mt-20">
                                There are many of Ipsum but the have Aliq is notm hendr erit
                                a augue insu image pellen simply free text
                            </div>
                            <div class="d-sm-flex mt-50">
                                <div class="text-block">
                                    <div class="d-flex align-items-center mb-5 mb-sm-0">
                                        <img class="icon" src="{{ asset('/uploads/img/team1-3.jpg') }}" alt />
                                        <div class="ms-4">
                                            <h5 class="title mb-0">Michele Morrone</h5>
                                            <p class="my-0">Founder & CEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-block-two ml-40 ml-xs--0">
                                    <div class="btm-box">
                                        <a href="page-about.html" class="theme-btn btn-style-one"><span
                                                class="btn-title">Discover More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-section-two pt-0 pb-90">
        <div class="floating-object1 bounce-y">
            <img src="{{ asset('/uploads/img/floating-obj1.png') }}" alt />
        </div>
        <div class="floating-object2 bounce-y">
            <img src="{{ asset('/uploads/img/floating-obj3.png') }}" alt />
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="sec-title">
                        <span class="sub-title">SERVICES WE OFFER</span>
                        <h2>We Provide Full Range AC Services</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image overlay-anim mb-0">
                                    <img src="{{ asset('/uploads/img/service2-1.jpg') }}" alt />
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h4 class="title">
                                    <a href="page-service-details.html">AC Maintenance</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image overlay-anim mb-0">
                                    <img src="{{ asset('/uploads/img/service2-2.jpg') }}" alt />
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h4 class="title">
                                    <a href="page-service-details.html">Cooling Services</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image overlay-anim mb-0">
                                    <img src="{{ asset('/uploads/img/service2-3.jpg') }}" alt />
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h4 class="title">
                                    <a href="page-service-details.html">Heating and Water</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image overlay-anim mb-0">
                                    <img src="{{ asset('/uploads/img/service2-4.jpg') }}" alt />
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h4 class="title">
                                    <a href="page-service-details.html">HVAC Installation</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image overlay-anim mb-0">
                                    <img src="{{ asset('/uploads/img/service2-5.jpg') }}" alt />
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h4 class="title">
                                    <a href="page-service-details.html">Heating Services</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6">
                    <div class="service-block-two style2">
                        <div class="inner-box">
                            <div class="lower-content">
                                <p>Get Solutions for Air Conditioner</p>
                                <h4 class="title">
                                    <a href="page-service-details.html">Don't Waste a Second! Call Us to Solve Your Any
                                        Technical Problem</a>
                                </h4>
                                <a href="page-about.html" class="theme-btn btn-style-one"><span class="btn-title">Find
                                        your solution</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="offer-section">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title">MODERN EQUIPMENT</span>
                            <h2 class="title">Comfort your Life Reality from Today</h2>
                        </div>
                        <div class="info-box">
                            <span class="count">01</span>
                            <div class="text">
                                Our technologies are designed for a comfortable climate in
                                your home
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="count">02</span>
                            <div class="text">
                                We are providing services over 100+ successful air condition
                                every year
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img src="{{ asset('/uploads/img/image-6.jpg') }}" alt />
                            </figure>
                            <div class="video-box wow fadeIn">
                                <h4 class="title">Watch our video</h4>
                                <img class="arrow-icon" src="{{ asset('/uploads/img/arrow.png') }}" alt />
                                <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-btn lightbox-image"><i
                                        class="icon fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section-two pt-120 pb-50">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">WHY CHOOSE US</span>
                <h2>
                    Why you Should Choose <br class="d-none d-sm-block" />our Services
                </h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="content-wrap">
                                <div class="icon-wrap">
                                    <div class="icon">
                                        <i class="flaticon-ac1-power-button"></i>
                                    </div>
                                </div>
                                <h4 class="title">Monthly Air Quality Testing</h4>
                                <div class="text">
                                    You’ve almost certainly heard us say at some point that
                                    air inside
                                </div>
                            </div>
                            <div class="feature-btn">
                                <a href="page-about.html">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="content-wrap">
                                <div class="icon-wrap">
                                    <div class="icon"><i class="flaticon-ac1-swing"></i></div>
                                </div>
                                <h4 class="title">HVAC Cleaning & Optimization</h4>
                                <div class="text">
                                    You’ve almost certainly heard us say at some point that
                                    air inside
                                </div>
                            </div>
                            <div class="feature-btn">
                                <a href="page-about.html">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="content-wrap">
                                <div class="icon-wrap">
                                    <div class="icon">
                                        <i class="flaticon-ac1-repeat"></i>
                                    </div>
                                </div>
                                <h4 class="title">Installation & Maintenance</h4>
                                <div class="text">
                                    You’ve almost certainly heard us say at some point that
                                    air inside
                                </div>
                            </div>
                            <div class="feature-btn">
                                <a href="page-about.html">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="content-wrap">
                                <div class="icon-wrap">
                                    <div class="icon"><i class="flaticon-ac1-hot"></i></div>
                                </div>
                                <h4 class="title">Money & Energy Efficiency</h4>
                                <div class="text">
                                    You’ve almost certainly heard us say at some point that
                                    air inside
                                </div>
                            </div>
                            <div class="feature-btn">
                                <a href="page-about.html">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
