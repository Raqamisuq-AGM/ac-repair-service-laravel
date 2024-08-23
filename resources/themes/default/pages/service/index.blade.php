@php
    $dataArray = json_decode($systemSeo->meta_keyword);
@endphp

@extends(themeView('partials.layout'))

@section('title')
    {{ 'Services | ' }}{{ $systemSeo->meta_title }}
@endsection
@section('description')
    {{ $systemSeo->meta_desc }}
@endsection
@section('keywords')
    @foreach ($dataArray as $index => $item)
        {{ $item->value }}@if (!$loop->last)
            ,
        @endif
    @endforeach
@endsection
@section('og_image')
    {{ asset($systemSeo->meta_og_thumb) }}
@endsection
@section('twitter_image')
    {{ asset($systemSeo->meta_og_thumb) }}
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
                @if ($services->isNotEmpty())
                    @foreach ($services as $service)
                        <div class="service-block mb-80 col-md-6 col-lg-4">
                            <div class="inner-box">
                                <div class="lower-content">
                                    {{-- <div class="icon flaticon-ac1-air-conditioner-9"></div> --}}
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}"
                                        class="read-more"><i class="fa-solid fa-arrow-right"></i></a>
                                    <h4 class="title">
                                        <a href="{{ route('service.details', ['slug' => $service->slug]) }}"
                                            style="color: inherit;
                                                    overflow: hidden;
                                                    -webkit-line-clamp: 2;
                                                    display: box;
                                                    display: -webkit-box;
                                                    -webkit-box-orient: vertical;
                                                    text-overflow: ellipsis;
                                                    white-space: normal;">
                                            {{ $service->title }}
                                        </a>
                                    </h4>
                                    <div class="text">
                                        {{ $service->short_desc }}
                                    </div>
                                </div>
                                <div class="image-box">
                                    <figure class="image overlay-anim">
                                        <img src="{{ asset($service->cover_photo) }}" alt />
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No services available at the moment.</p>
                @endif
            </div>

            <!-- Add pagination links here -->
            <div class="pagination-wrapper text-center">
                {{ $services->onEachSide(1)->links() }}
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .pagination-wrapper {
            width: fit-content;
            margin: auto;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #ff5500 !important;
            border-color: #ff5500 !important;
        }
    </style>
@endsection
