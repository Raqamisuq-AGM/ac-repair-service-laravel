@extends(themeView('partials.layout'))

@section('title')
    {{ 'Service Details' }}
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
                <h1 class="title">Services</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="services-details">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-8">
              <div class="services-details__content">
                <img src="{{asset('/uploads/img/service-details.jpg')}}" alt />
                <h3 class="mt-4">Air Conditioning & Heating Services</h3>
                <p>
                  Lorem ipsum is simply free text used by copytyping refreshing.
                  Neque porro est qui dolorem ipsum quia quaed inventore
                  veritatis et quasi architecto beatae vitae dicta sunt
                  explicabo. Aelltes port lacus quis enim var sed efficitur
                  turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply
                  dummy text of the printing and typesetting industry. Lorem
                  Ipsum has been the ndustry standard dummy text ever since the
                  1500s, when an unknown took a galley of type and it to make a
                  type specimen book.
                </p>
                <p>
                  When an unknown printer took a galley of type and it to make a
                  type specimen book. It has survived not only five centuries,
                  but also the leap into typesetting, remaining essentially
                  unchanged.
                </p>
                <div class="content">
                  <div class="text">
                    <h3>Our Scope of Work</h3>
                    <p>
                      Lorem ipsum is simply free text used by copytyping
                      refreshing. Neque porro est qui dolorem ipsum quia quaed
                      inventore veritatis et quasi architecto beatae vitae dicta
                      sunt explicabo.
                    </p>
                  </div>
                  <div class="feature-list mb-20">
                    <div class="row clearfix">
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="single-item">
                          <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <h6 class="title">We're Certified</h6>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="single-item">
                          <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <h6 class="title">Professional Technician</h6>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="single-item">
                          <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <h6 class="title">Awards Achievement</h6>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="single-item">
                          <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <h6 class="title">Best Services</h6>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="single-item">
                          <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <h6 class="title">Expert Team</h6>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 column">
                        <div class="single-item">
                          <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                          </div>
                          <h6 class="title">Assessments</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-4">
              <div class="service-sidebar">
                <div class="sidebar-widget service-sidebar-single">
                  <div
                    class="service-sidebar-single-services wow fadeInUp"
                    data-wow-delay="0.1s"
                    data-wow-duration="1200m"
                  >
                    <div class="title">
                      <h3>All Services</h3>
                    </div>
                    <ul>
                      <li class="current">
                        <a href="page-service-details.html"
                          >HVAC Installation <i class="fa fa-angle-right"></i
                        ></a>
                      </li>
                      <li>
                        <a href="page-service-details.html"
                          >Duct Repairing <i class="fa fa-angle-right"></i
                        ></a>
                      </li>
                      <li>
                        <a href="page-service-details.html"
                          >Indoor Air Quality <i class="fa fa-angle-right"></i
                        ></a>
                      </li>
                      <li>
                        <a href="page-service-details.html"
                          >Thermal Systems <i class="fa fa-angle-right"></i
                        ></a>
                      </li>
                      <li>
                        <a href="page-service-details.html"
                          >Other solution <i class="fa fa-angle-right"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="sidebar-widget service-sidebar-single">
                  <div
                    class="service-sidebar-single-contact-box text-center wow fadeInUp"
                    data-wow-delay="0.3s"
                    data-wow-duration="1200m"
                    style="background-image: url(images/resource/news-2.jpg)"
                  >
                    <div class="icon">
                      <span class="lnr lnr-icon-phone"></span>
                    </div>
                    <div class="title">
                      <h2>Best AC <br />Services</h2>
                    </div>
                    <p class="phone">
                      <a href="tel:123456789">666 888 0000</a>
                    </p>
                    <p>Call Us Anytime</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
