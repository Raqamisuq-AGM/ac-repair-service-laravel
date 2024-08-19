@extends(themeView('partials.layout'))

@section('title')
    {{ 'Services' }}
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

    <section class="service-section pt-150 pb-40">
        <div class="auto-container">
            <div class="row mt-20">
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
@endsection
