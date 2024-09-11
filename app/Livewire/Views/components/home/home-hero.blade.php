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