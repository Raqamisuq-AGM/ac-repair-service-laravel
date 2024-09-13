<section class="service-section pt-150 pb-40">
    <div class="auto-container">
        <div class="row mt-20">
            @if ($services->isNotEmpty())
            @foreach ($services as $service)
            <div class="service-block mb-80 col-md-6 col-lg-4">
                <div class="inner-box">
                    <div class="lower-content">
                        {{-- <div class="icon flaticon-ac1-air-conditioner-9"></div> --}}
                        <a href="{{ route('service.details', ['slug' => $service->slug]) }}" wire:navigate
                            class="read-more"><i class="fa-solid fa-arrow-right"></i></a>
                        <h4 class="title">
                            <a href="{{ route('service.details', ['slug' => $service->slug]) }}" wire:navigate
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
                            <img src="{{ asset('storage/'.$service->thumbnail) }}" alt="{{$service->title}}" style="width:265px;height:190px" />
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
        {{$services->links('components.pagination.pagination')}}
    </div>
</section>