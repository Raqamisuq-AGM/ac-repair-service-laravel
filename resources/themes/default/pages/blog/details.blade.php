@php
    $dataArray = json_decode($blog->meta_keyword);
@endphp

@extends(themeView('partials.layout'))

@section('title')
    {{ $blog->meta_title }}
@endsection
@section('description')
    {{ $blog->meta_desc }}
@endsection
@section('keywords')
    @foreach ($dataArray as $index => $item)
        {{ $item->value }}@if (!$loop->last)
            ,
        @endif
    @endforeach
@endsection
@section('og_image')
    {{ asset($blog->meta_og_thumb) }}
@endsection
@section('twitter_image')
    {{ asset($blog->meta_og_thumb) }}
@endsection

@section('content')
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Blog Details</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Blog Details</li>
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
                            <img src="{{ asset($blog->cover_photo) }}" alt />
                            @php
                                $date = $blog->created_at; // Your datetime string
                                $formattedDate = \Carbon\Carbon::parse($date); // Parse the date string using Carbon
                                $day = $formattedDate->format('d'); // Get the day of the month
                                $month = $formattedDate->format('M'); // Get the abbreviated month name
                            @endphp
                            <div class="blog-details__date">
                                <span class="day">{{ $day }}</span>
                                <span class="month">{{ $month }}</span>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <h3 class="blog-details__title">
                                {{ $blog->title }}
                            </h3>
                            <p class="blog-details__text-2">
                                {!! $blog->desc !!}
                            </p>
                        </div>
                        {{-- <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>Tags</span> <a href="{{ route('blog.details', ['slug' => 'fgwae']) }}">Servicing</a>
                                <a href="{{ route('blog.details', ['slug' => 'fgwae']) }}">AC</a>
                            </p>
                            <div class="blog-details__social-list">
                                <a href="{{route('blog.details',['slug'=>'fgwae'])}}"><i class="fab fa-twitter"></i></a>
                                <a href="{{route('blog.details',['slug'=>'fgwae'])}}"><i class="fab fa-facebook"></i></a>
                                <a href="{{route('blog.details',['slug'=>'fgwae'])}}"><i class="fab fa-pinterest-p"></i></a>
                                <a href="{{route('blog.details',['slug'=>'fgwae'])}}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        {{-- <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search here" />
                                <button type="submit">
                                    <i class="lnr-icon-search"></i>
                                </button>
                            </form>
                        </div> --}}
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">More Posts</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @if ($blogs->isNotEmpty())
                                    @foreach ($blogs as $item)
                                        <li>
                                            <div class="sidebar__post-image">
                                                <img src="{{ asset($item->cover_photo) }}" alt />
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h3>
                                                    <a
                                                        href="{{ route('blog.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                                </h3>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        {{-- <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Categories</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                <li>
                                    <a href="{{route('blog.details',['slug'=>'fgwae'])}}">HVAC<span class="icon-right-arrow"></span></a>
                                </li>
                                <li class="active">
                                    <a href="{{route('blog.details',['slug'=>'fgwae'])}}">Installation<span class="icon-right-arrow"></span></a>
                                </li>
                                <li>
                                    <a href="{{route('blog.details',['slug'=>'fgwae'])}}">Repairing<span class="icon-right-arrow"></span></a>
                                </li>
                                <li>
                                    <a href="{{route('blog.details',['slug'=>'fgwae'])}}">Air Quality<span class="icon-right-arrow"></span></a>
                                </li>
                                <li>
                                    <a href="{{route('blog.details',['slug'=>'fgwae'])}}">Thermal<span class="icon-right-arrow"></span></a>
                                </li>
                                <li>
                                    <a href="{{route('blog.details',['slug'=>'fgwae'])}}">Checkup<span class="icon-right-arrow"></span></a>
                                </li>
                            </ul>
                        </div> --}}
                        {{-- <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <div class="sidebar__tags-list">
                                <a href="#">Business</a> <a href="#">HVAC</a>
                                <a href="#">Checkup</a> <a href="#">Servicing</a>
                                <a href="#">Repairing</a> <a href="#">Trends</a>
                            </div>
                        </div> --}}
                        {{-- <div class="sidebar__single sidebar__comments">
                            <h3 class="sidebar__title">Recent Comments</h3>
                            <ul class="sidebar__comments-list list-unstyled">
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>
                                            A wordpress commenter on <br />
                                            launch new mobile app
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p><span>John Doe</span> on template:</p>
                                        <h5>comments</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>
                                            A wordpress commenter on <br />
                                            launch new mobile app
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p><span>John Doe</span> on template:</p>
                                        <h5>comments</h5>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
