@php
    $dataArray = json_decode($systemSeo->meta_keyword);
@endphp

@extends(themeView('partials.layout'))

@section('title')
    {{ 'Blog | ' }}{{ $systemSeo->meta_title }}
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
    {{ $systemSeo->meta_og_thumb }}
@endsection
@section('twitter_image')
    {{ $systemSeo->meta_og_thumb }}
@endsection

@section('content')
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Blog</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="news-section pb-70">
        <div class="auto-container">
            <div class="row">
                @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $blog)
                        <div class="news-block col-lg-4 col-md-6 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                                            <img src="{{ asset($blog->cover_photo) }}" alt />
                                        </a>
                                    </figure>
                                    @php
                                        $date = $blog->created_at; // Your datetime string
                                        $formattedDate = \Carbon\Carbon::parse($date); // Parse the date string using Carbon
                                        $day = $formattedDate->format('d'); // Get the day of the month
                                        $month = $formattedDate->format('M'); // Get the abbreviated month name
                                    @endphp
                                    <span class="date">{{ $day }} <span
                                            class="month">{{ $month }}</span></span>
                                </div>
                                <div class="lower-content">
                                    <h4 class="title">
                                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}"
                                            style="color: inherit;
                                                    overflow: hidden;
                                                    -webkit-line-clamp: 2;
                                                    display: box;
                                                    display: -webkit-box;
                                                    -webkit-box-orient: vertical;
                                                    text-overflow: ellipsis;
                                                    white-space: normal;">
                                            {{ $blog->title }}
                                        </a>
                                    </h4>
                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="read-more">
                                        Read More <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Add pagination links here -->
            <div class="pagination-wrapper text-center">
                {{ $blogs->onEachSide(1)->links() }}
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
