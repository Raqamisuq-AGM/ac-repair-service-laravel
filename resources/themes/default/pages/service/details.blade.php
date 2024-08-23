@php
    $dataArray = json_decode($service->meta_keyword);
@endphp

@extends(themeView('partials.layout'))

@section('title')
    {{ $service->meta_title }}
@endsection
@section('description')
    {{ $service->meta_desc }}
@endsection
@section('keywords')
    @foreach ($dataArray as $index => $item)
        {{ $item->value }}@if (!$loop->last)
            ,
        @endif
    @endforeach
@endsection
@section('og_image')
    {{ $service->meta_og_thumb }}
@endsection
@section('twitter_image')
    {{ $service->meta_og_thumb }}
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
                        <h3 class="mt-4">{{ $service->title }}</h3>
                        <p>
                            {!! $service->desc !!}
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4">
                    <div class="service-sidebar">
                        <div class="sidebar-widget service-sidebar-single">
                            <div class="service-sidebar-single-contact-box text-center wow fadeInUp" data-wow-delay="0.3s"
                                data-wow-duration="1200m" style="background-image: url(images/resource/news-2.jpg)">
                                <div class="icon">
                                    <span class="lnr lnr-icon-phone"></span>
                                </div>
                                <div class="title">
                                    <h2>Best AC <br />Services</h2>
                                </div>
                                <p class="phone">
                                    <a href="tel:{{ $systemInfo->phone }}">{{ $systemInfo->phone }}</a>
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
