@extends(themeView('partials.layout'))

@section('title')
    {{ 'Title here' }}
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
    <!-- Hero Section -->
    <section class="banner-section-one">
        <div class="bg bg-image" style="background-image: url({{ asset('/uploads/img/home1-1.jpg') }})"></div>
        <div class="floating-object">
            <img src="{{ asset('/uploads/img/base1.png') }}" alt class="image-3" />
            <img src="{{ asset('/uploads/img/base2-1.png') }}" alt class="image-4" />
        </div>
        <div class="bottom-shape"></div>
        <div class="auto-container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="content-box">
                    <div class="title-box">
                        <span class="sub-title wow fadeInUp">Trusted & Professional Service</span>
                        <h1 class="title wow fadeInUp" data-wow-delay="600ms">
                            Quality Air<br class="d-none d-xl-block" />
                            Conditioning<br class="d-none d-xl-block" />
                            Repair Service
                        </h1>
                    </div>
                    <a href="{{ route('service') }}" class="theme-btn btn-style-one wow fadeInUp"
                        data-wow-delay="1200ms"><span class="btn-title">Our Services</span></a>
                </div>
                <span class="home-ac-icon wow fadeInUp"><img src="{{ asset('/uploads/img/ac1.png') }}" alt /></span>
            </div>
        </div>
    </section>

    <section class="about-section pb-40">
        <div class="bg bg-pattern-1"></div>
        <div class="auto-container">
            <div class="row">
                <div class="image-column col-xl-5">
                    <div class="inner-column wow fadeInLeft">
                        <figure class="image-1 overlay-anim wow fadeInUp">
                            <div class="animated-circle bounce-x"></div>
                            <img src="{{ asset('/uploads/img/about1-1.jpg') }}" alt />
                        </figure>
                        <figure class="image-2 overlay-anim wow fadeInUp">
                            <img src="images/resource/about1-2.jpg" alt />
                        </figure>
                        <div class="video-box">
                            <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-btn" data-fancybox="gallery"
                                data-caption><i class="icon fas fa-play" aria-hidden="true"></i></a>
                            <div class="icon-text"></div>
                        </div>
                    </div>
                </div>
                <div class="content-column col-xl-6 offset-xl-1 wow fadeInLeft" data-wow-delay="300ms">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title">Our Introduction</span>
                            <h2>
                                Quality <span class="color1">AC Repair Service</span> With
                                Quality Repair Solutions
                            </h2>
                            <div class="text">
                                Quis aliqua sunt nisi consectetur anim ullamco ea deserunt
                                non voluptate nisi sit elit exercitation ullamco humou or
                                random
                            </div>
                            <div class="row mt-40">
                                <div class="about-block col-md-6">
                                    <div class="inner d-flex align-items-center">
                                        <i class="icon flaticon-ac1-split"></i>
                                        <h5 class="title ms-4 mb-2">
                                            Expert Team <br class="d-none d-xl-block" />
                                            Members
                                        </h5>
                                    </div>
                                </div>
                                <div class="about-block col-md-6">
                                    <div class="inner d-flex align-items-center">
                                        <i class="icon flaticon-ac1-freeze-1"></i>
                                        <h5 class="title ms-4 mb-2">
                                            Safe Solution For <br class="d-none d-xl-block" />
                                            Home
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                                elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus
                                leo
                            </div>
                            <div class="d-sm-flex mt-40">
                                <div class="about-block">
                                    <div class="btm-box">
                                        <a href="{{ route('service') }}" class="theme-btn btn-style-one"><span
                                                class="btn-title">Discover More</span></a>
                                    </div>
                                </div>
                                <div class="text-block ml-30 ml-xs--0">
                                    <div class="d-flex align-items-center">
                                        <i class="icon lnr-icon-phone-handset"></i>
                                        <div class="ms-3">
                                            <p class="my-0">Call Us Anytime</p>
                                            <a href="tel:92-666-888-000">92 666 888 000</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-section pb-md-70 pb-60" style="margin-top: -120px;">
        <div class="auto-container">
            <div class="d-sm-flex align-items-sm-center justify-content-sm-between mb-xs-10">
                <div class="sec-title mb-xs-10">
                    <span class="sub-title">Our Services</span>
                    {{-- <h2>News & Articles</h2> --}}
                </div>
                <a href="{{ route('service') }}" class="theme-btn btn-style-one mb-50"><span class="btn-title">Discover
                        More</span></a>
            </div>
            <div class="row">
                <div class="service-block mb-80 col-md-6 col-lg-4">
                    <div class="inner-box">
                        <div class="lower-content">
                            {{-- <div class="icon flaticon-ac1-air-conditioner-9"></div> --}}
                            <a href="{{ route('service.details', ['slug' => 'fea']) }}" class="read-more"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <h4 class="title">
                                <a href="{{ route('service.details', ['slug' => 'fea']) }}">Cooling Services</a>
                            </h4>
                            <div class="text">
                                Aliq is notm hendr erit a Latin augue insu establi shed fact
                            </div>
                        </div>
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img src="{{ asset('/uploads/img/service1-1.jpg') }}" alt />
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="service-block mb-80 col-md-6 col-lg-4">
                    <div class="inner-box">
                        <div class="lower-content">
                            {{-- <div class="icon flaticon-ac1-mechanic"></div> --}}
                            <a href="{{ route('service.details', ['slug' => 'fea']) }}" class="read-more"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <h4 class="title">
                                <a href="{{ route('service.details', ['slug' => 'fea']) }}">AC Maintenance</a>
                            </h4>
                            <div class="text">
                                Aliq is notm hendr erit a Latin augue insu establi shed fact
                            </div>
                        </div>
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img src="{{ asset('/uploads/img/service1-2.jpg') }}" alt />
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="service-block mb-80 col-md-6 col-lg-4">
                    <div class="inner-box">
                        <div class="lower-content">
                            {{-- <div class="icon flaticon-ac1-air-conditioner-11"></div> --}}
                            <a href="{{ route('service.details', ['slug' => 'fea']) }}" class="read-more"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <h4 class="title">
                                <a href="{{ route('service.details', ['slug' => 'fea']) }}">Dust Cleaning</a>
                            </h4>
                            <div class="text">
                                Aliq is notm hendr erit a Latin augue insu establi shed fact
                            </div>
                        </div>
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img src="{{ asset('/uploads/img/service1-1.jpg') }}" alt />
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="service-block mb-80 col-md-6 col-lg-4">
                    <div class="inner-box">
                        <div class="lower-content">
                            {{-- <div class="icon flaticon-ac1-mechanic"></div> --}}
                            <a href="{{ route('service.details', ['slug' => 'fea']) }}" class="read-more"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <h4 class="title">
                                <a href="{{ route('service.details', ['slug' => 'fea']) }}">AC Maintenance</a>
                            </h4>
                            <div class="text">
                                Aliq is notm hendr erit a Latin augue insu establi shed fact
                            </div>
                        </div>
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img src="{{ asset('/uploads/img/service1-2.jpg') }}" alt />
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="service-block mb-80 col-md-6 col-lg-4">
                    <div class="inner-box">
                        <div class="lower-content">
                            {{-- <div class="icon flaticon-ac1-air-conditioner-11"></div> --}}
                            <a href="{{ route('service.details', ['slug' => 'fea']) }}" class="read-more"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <h4 class="title">
                                <a href="{{ route('service.details', ['slug' => 'fea']) }}">Dust Cleaning</a>
                            </h4>
                            <div class="text">
                                Aliq is notm hendr erit a Latin augue insu establi shed fact
                            </div>
                        </div>
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img src="{{ asset('/uploads/img/service1-3.jpg') }}" alt />
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="service-block mb-80 col-md-6 col-lg-4">
                    <div class="inner-box">
                        <div class="lower-content">
                            {{-- <div class="icon flaticon-ac1-air-conditioner-9"></div> --}}
                            <a href="{{ route('service.details', ['slug' => 'fea']) }}" class="read-more"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <h4 class="title">
                                <a href="{{ route('service.details', ['slug' => 'fea']) }}">Cooling Services</a>
                            </h4>
                            <div class="text">
                                Aliq is notm hendr erit a Latin augue insu establi shed fact
                            </div>
                        </div>
                        <div class="image-box">
                            <figure class="image overlay-anim">
                                <img src="{{ asset('/uploads/img/service1-1.jpg') }}" alt />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section-two pt-0 pb-80">
        <div class="icon-shape-5"></div>
        <div class="auto-container">
            <h1 class="title">Domain Name</h1>
            <div class="row">
                <div class="sec-title-column col-lg-4 col-md-6 wow fadeInLeft">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>Warranty Repair and Service for 5 years</h2>
                        </div>
                    </div>
                </div>
                <div class="text-column col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="inner-column">
                        <div class="text">
                            There are many variations of passages of but the majority have
                            in some form, by injected humou or which words
                        </div>
                        <div class="text two">
                            Lorem don't look even slightly believable of but the majority
                            have suffered
                        </div>
                    </div>
                </div>
                <div class="skills-column col-lg-4 wow fadeInRight" data-wow-delay="300ms">
                    <div class="inner-column">
                        <div class="skills style-two">
                            <div class="skill-item">
                                <div class="skill-header">
                                    <div class="skill-title">Maintenance</div>
                                </div>
                                <div class="skill-bar">
                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="85">
                                            <div class="skill-percentage">
                                                <div class="count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="85">0</span>%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="skill-item">
                                <div class="skill-header">
                                    <div class="skill-title">HVAC</div>
                                </div>
                                <div class="skill-bar">
                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="57">
                                            <div class="skill-percentage">
                                                <div class="count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="57">0</span>%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="skill-item">
                                <div class="skill-header">
                                    <div class="skill-title">Cooling</div>
                                </div>
                                <div class="skill-bar">
                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="92">
                                            <div class="skill-percentage">
                                                <div class="count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="92">0</span>%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section">
        <div class="auto-container">
            <div class="outer-box">
                <div class="row align-items-center">
                    <div class="title-column col-lg-5 col-xl-5">
                        <div class="inner-column text-center text-lg-start mb-md-30">
                            <div class="sec-title light mb-0">
                                <h3 class="mb-0 title">
                                    Need An Air Contioner<br />Technician
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="contact-button col-lg-2 col-xl-2">
                        <div class="text-center mb-md-30">
                            <a href="tel:0123456789" class="icon fa-sharp fal fa-phone"></a>
                        </div>
                    </div>
                    <div class="contact-column col-lg-5 col-xl-5">
                        <div class="inner-column text-center text-lg-end">
                            <p class="text">Get professional help</p>
                            <h3 class="phone">92 666 888 0000</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="bg-image overlay-anim" style="background-image: url({{ asset('/uploads/img/bg2.jpg') }})"></div>
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6">
                    <div class="inner-column wow fadeInLeft">
                        <div class="sec-title light">
                            <span class="sub-title">Why Choose Us</span>
                            <h2>
                                Solutions for an Every
                                <br class="d-none d-xl-block" />Repair Problem
                            </h2>
                            <div class="text">
                                Duis aute irure dolor in reprehenderit in voluptate velit
                                esse cillum dolore eu fugiat nulla pariatur
                            </div>
                        </div>
                        <div class="row">
                            <div class="feature-block-two col-lg-12">
                                <div class="inner-box">
                                    <i class="icon flaticon-ac1-clipboard"></i>
                                    <div class="ml-110 ml-sm--0">
                                        <h5 class="title">Affordable Service Prices</h5>
                                        <p class="text">
                                            There are many variations of passages of lorem free
                                            market but the majority
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-block-two col-lg-12">
                                <div class="inner-box">
                                    <i class="icon flaticon-ac1-mechanic"></i>
                                    <div class="ml-110 ml-sm--0">
                                        <h5 class="title">24/7 Customer Support</h5>
                                        <p class="text">
                                            There are many variations of passages of lorem free
                                            market but the majority
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-column col-lg-6">
                    <div class="inner-column">
                        <div class="video-box">
                            <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now-two lightbox-image"><i
                                    class="icon fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section pb-80 pb-md-30">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6"></div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="sec-title mb-30">
                        <span class="sub-title">Our Expert Members</span>
                        <h2>
                            Professional <br /><span class="color1">Expert</span> Team
                        </h2>
                    </div>
                    <p>
                        Ipsum sit amet consectetur ullamcorper mattis pulvinar leo Write
                        short that will describe the title useful
                    </p>
                </div>
                <div class="col-lg-8">
                    <div class="home1-team-slider mt-md-30 owl-carousel owl-theme">
                        <div class="team-block mt-2 mb-0 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}"><img
                                                src="{{ asset('/uploads/img/team1-1.jpg') }}" alt /></a>
                                    </figure>
                                    <div class="social-links">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <span class="designation">Manager</span>
                                    <h4 class="name">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}">Kevin Martin</a>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="team-block mt-2 mb-0 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}"><img
                                                src="{{ asset('/uploads/img/team1-2.jpg') }}" alt /></a>
                                    </figure>
                                    <div class="social-links">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <span class="designation">Manager</span>
                                    <h4 class="name">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}">Richerd Fred</a>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="team-block mt-2 mb-0 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}"><img
                                                src="{{ asset('/uploads/img/team1-3.jpg') }}" alt /></a>
                                    </figure>
                                    <div class="social-links">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <span class="designation">Manager</span>
                                    <h4 class="name">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}">Jams Millard</a>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="team-block mt-2 mb-0 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}"><img
                                                src="{{ asset('/uploads/img/team1-4.jpg') }}" alt /></a>
                                    </figure>
                                    <div class="social-links">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <span class="designation">Chief Engineer</span>
                                    <h4 class="name">
                                        <a href="{{ route('team.details', ['slug' => 'fea']) }}">Kirk Mathison</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="bg bg-img4"></div>
        <div class="outer-box mx-auto">
            <div class="auto-container">
                <div class="row">
                    <div class="form-column col-lg-6">
                        <div class="inner-column">
                            <div class="form-outer">
                                <div class="contact-form wow fadeInLeft">
                                    <div class="sec-title mb-15">
                                        <span class="sub-title">GET A QUOTE</span>
                                        <h2>Get in touch with us</h2>
                                    </div>

                                    <form id="contact_form" name="contact_form" class action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="form_name" placeholder="Your Name"
                                                    required />
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="form_email" placeholder="Your Email"
                                                    required />
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="form_subject" placeholder="Subject"
                                                    required />
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="form_phone" placeholder="Phone No"
                                                    required />
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <input name="form_botcheck" class="form-control" type="hidden" value />
                                                <button type="submit" class="theme-btn btn-style-one hvr-light"
                                                    data-loading-text="Please wait...">
                                                    <span class="btn-title">Send message</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-column col-lg-6">
                        <div class="feature-box">
                            <div class="box-wrapper">
                                <i class="icon flaticon-ac1-mechanic"></i>
                                <div class="icon-text">
                                    <h5 class="title">
                                        Our Dedicated Team Is Ready To Help You!
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section pb-90">
        <div class="auto-container">
            <div class="d-sm-flex align-items-sm-center justify-content-sm-between mb-xs-10">
                <div class="sec-title mb-xs-10">
                    <span class="sub-title">From The Blog</span>
                    <h2>News & Articles</h2>
                </div>
                <a href="{{ route('blog') }}" class="theme-btn btn-style-one mb-50"><span class="btn-title">Discover
                        More</span></a>
            </div>
            <div class="row">
                <div class="news-block col-lg-4 col-md-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'fewa']) }}"><img
                                        src="{{ asset('/uploads/img/news-1.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'fewa']) }}">How To Solve Less Cooling
                                    Problems
                                    In AC</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'fewa']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="news-block col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'fewa']) }}"><img
                                        src="{{ asset('/uploads/img/news-2.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'fewa']) }}">Make Your Home More
                                    Sustainable</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'fewa']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="news-block col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="600ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'fewa']) }}"><img
                                        src="{{ asset('/uploads/img/news-3.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'fewa']) }}">10 Tips to Increase Your Ac
                                    Efficiency</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'fewa']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('styles')
    <style>
        .contact-section:after {
            background-image: url({{ asset('/uploads/img/bg-shape3.png') }}) !important;
        }

        .contact-section .bg-img4 {
            background-image: url({{ asset('/uploads/img/bg4.jpg') }}) !important;
        }

        .about-section-two .title {
            background-image: url({{ asset('/uploads/img/bg-text.jpg') }});
        }
    </style>
@endsection
