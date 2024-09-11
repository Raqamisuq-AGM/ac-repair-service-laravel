<div>
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">About us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index') }}" wire:navigate>Home</a></li>
                    <li>About us</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="service-section-two pt-150 pb-90">
        <div class="floating-object1 bounce-y">
            <img src="{{asset('uploads/img/floating-obj1.png')}}" alt />
        </div>
        <div class="floating-object2 bounce-y">
            <img src="{{asset('uploads/img/floating-obj3.png')}}" alt />
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
                                    <img src="{{asset('uploads/img/service2-1.jpg')}}" alt />
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
                                    <img src="{{asset('uploads/img/service2-2.jpg')}}" alt />
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
                                    <img src="{{asset('uploads/img/service2-3.jpg')}}" alt />
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
                                    <img src="{{asset('uploads/img/service2-4.jpg')}}" alt />
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
                                    <img src="{{asset('uploads/img/service2-5.jpg')}}" alt />
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
                                <a href="{{route('contact')}}" wire:navigate class="theme-btn btn-style-one"><span class="btn-title">Schedule Appointment</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <livewire:components.home.home-meta title="About Us" />
    <livewire:components.about.about lazy />
</div>