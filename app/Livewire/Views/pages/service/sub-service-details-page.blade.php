@section('title')
{{$service->meta_title}} | {{$systemInfo->title}}
@endsection

@section('keywords')
{{ $service->meta_tags }}
@endsection

@section('description')
{{ $service->meta_description }}
@endsection

@section('og_image')
{{ asset('storage/'.$service->thumbnail) }}
@endsection
@section('twitter_image')
{{ asset('storage/'.$service->thumbnail) }}
@endsection
<div>
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">{{$parentService->title}}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index') }}" wire:navigate>Home</a></li>
                    <li><a href="{{ route('service.details', ['slug'=> $parentService->slug]) }}" wire:navigate>{{$parentService->title}}</a></li>
                    <li>{{$service->title}}</li>
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
</div>