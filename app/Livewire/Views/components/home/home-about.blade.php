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
                        <div class="d-sm-flex mt-40">
                            <div class="about-block">
                                <div class="btm-box">
                                    <a href="{{ route('service') }}" wire:navigate class="theme-btn btn-style-one"><span
                                            class="btn-title">Discover More</span></a>
                                </div>
                            </div>
                            <div class="text-block ml-30 ml-xs--0">
                                <div class="d-flex align-items-center">
                                    <i class="icon lnr-icon-phone-handset"></i>
                                    <div class="ms-3">
                                        <p class="my-0">Call Us Anytime</p>
                                        <a href="tel:{{ $systemInfo->phone }}">{{ $systemInfo->phone }}</a>
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
