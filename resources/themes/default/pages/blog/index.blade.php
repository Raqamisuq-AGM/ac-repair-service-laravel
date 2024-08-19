@extends(themeView('partials.layout'))

@section('title')
    {{ 'Blog Details' }}
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
                <div class="news-block mb-50 col-lg-4 col-md-6 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}"><img
                                        src="{{ asset('/uploads/img/news-1.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}">How To Solve Less Cooling Problems
                                    In
                                    AC</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'feae']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="news-block mb-50 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}"><img
                                        src="{{ asset('/uploads/img/news-2.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}">Make Your Home More
                                    Sustainable</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'feae']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="news-block mb-50 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}"><img
                                        src="{{ asset('/uploads/img/news-3.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}">10 Tips to Increase Your Ac
                                    Efficiency</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'feae']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="news-block mb-50 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}"><img
                                        src="{{ asset('/uploads/img/news-2.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}">Make Your Home More
                                    Sustainable</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'feae']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="news-block mb-50 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}"><img
                                        src="{{ asset('/uploads/img/news-3.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}">10 Tips to Increase Your Ac
                                    Efficiency</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'feae']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="news-block mb-50 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}"><img
                                        src="{{ asset('/uploads/img/news-1.jpg') }}" alt /></a>
                            </figure>
                            <span class="date">17 <span class="month">APR</span></span>
                        </div>
                        <div class="lower-content">
                            <h4 class="title">
                                <a href="{{ route('blog.details', ['slug' => 'feae']) }}">How To Solve Less Cooling
                                    Problems
                                    In AC</a>
                            </h4>
                            <a href="{{ route('blog.details', ['slug' => 'feae']) }}" class="read-more">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
