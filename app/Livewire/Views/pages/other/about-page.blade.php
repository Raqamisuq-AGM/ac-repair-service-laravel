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
            <img src="{{asset('uploads/img/floating-obj1.png')}}" alt="" />
        </div>
        <div class="floating-object2 bounce-y">
            <img src="{{asset('uploads/img/floating-obj3.png')}}" alt="" />
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="sec-title">
                        <span class="sub-title">SERVICES WE OFFER</span>
                        <h2>We Provide Full Range AC Services</h2>
                    </div>
                </div>

                <!-- Loop through services dynamically -->
                @foreach($services as $service)
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box" style="height: 274px; width: 274px;">
                                <figure class="image overlay-anim mb-0">
                                    <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->title }}" />
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h4 class="title">
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <livewire:components.home.home-meta title="About Us" />
    <livewire:components.about.about lazy />
    <livewire:components.home.home-contact />
</div>