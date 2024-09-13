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
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{asset('storage/'.$service->thumbnail)}}" alt="{{$service->title}}" />
                        </div>
                        <div class="blog-details__content">
                            <p class="blog-details__text-2">
                                {!! $service->content !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Other Services</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($otherServices as $otherService)
                                <li>
                                    <div class="sidebar__post-image" style="width: 70px; height:45px">
                                        <img src="{{asset('storage/'.$otherService->thumbnail)}}" alt="{{$otherService->title}}" />
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="{{route('service.details',['slug'=>$otherService->slug])}}" wire:navigate>{{$otherService->title}}</a>
                                        </h3>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <livewire:components.home.home-contact />
    </section>
</div>