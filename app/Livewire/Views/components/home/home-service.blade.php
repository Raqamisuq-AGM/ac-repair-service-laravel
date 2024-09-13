<section class="service-section pb-md-70 pb-60" style="margin-top: -120px;">
    <div class="auto-container">
        <div class="d-sm-flex align-items-sm-center justify-content-sm-between mb-xs-10">
            <div class="sec-title mb-xs-10">
                <span class="sub-title">Our Services</span>
                {{-- <h2>News & Articles</h2> --}}
            </div>
            <a href="{{ route('service') }}" wire:navigate class="theme-btn btn-style-one mb-50"><span class="btn-title">Discover
                    More</span></a>
        </div>
        <div class="row">
            @if ($services->isNotEmpty())
            @foreach ($services as $service)
            <div class="service-block mb-80 col-md-6 col-lg-4">
                <div class="inner-box">
                    <div class="lower-content">
                        {{-- <div class="icon flaticon-ac1-air-conditioner-9"></div> --}}
                        <a href="{{ route('service.details', ['slug' => $service->slug]) }}"
                            class="read-more" wire:navigate><i class="fa-solid fa-arrow-right"></i></a>
                        <h4 class="title">
                            <a href="{{ route('service.details', ['slug' => $service->slug]) }}" wire:navigate
                                style="color: inherit;
                                                    overflow: hidden;
                                                    -webkit-line-clamp: 1;
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
                            <img src="{{ asset('storage/'.$service->thumbnail) }}" alt="{{$service->title}}" style="width:265px;height:190px" />
                        </figure>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>