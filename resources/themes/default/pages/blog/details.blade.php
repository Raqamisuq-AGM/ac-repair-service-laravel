@extends(themeView('partials.layout'))

@section('title')
    {{ 'Blogs' }}
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
                            <img src="{{ asset('/uploads/img/news-details.jpg') }}" alt />
                            <div class="blog-details__date">
                                <span class="day">28</span>
                                <span class="month">Aug</span>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <h3 class="blog-details__title">
                                We very careful handling the valuable goods
                            </h3>
                            <p class="blog-details__text-2">
                                Mauris non dignissim purus, ac commodo diam. Donec sit amet
                                lacinia nulla. Aliquam quis purus in justo pulvinar tempor.
                                Aliquam tellus nulla, sollicitudin at euismod nec, feugiat
                                at nisi. Quisque vitae odio nec lacus interdum tempus.
                                Phasellus a rhoncus erat. Vivamus vel eros vitae est aliquet
                                pellentesque vitae et nunc. Sed vitae leo vitae nisl
                                pellentesque semper.
                            </p>
                            <p class="blog-details__text-2">
                                Mauris non dignissim purus, ac commodo diam. Donec sit amet
                                lacinia nulla. Aliquam quis purus in justo pulvinar tempor.
                                Aliquam tellus nulla, sollicitudin at euismod nec, feugiat
                                at nisi. Quisque vitae odio nec lacus interdum tempus.
                                Phasellus a rhoncus erat. Vivamus vel eros vitae est aliquet
                                pellentesque vitae et nunc. Sed vitae leo vitae nisl
                                pellentesque semper.
                            </p>
                            <p class="blog-details__text-2">
                                Mauris non dignissim purus, ac commodo diam. Donec sit amet
                                lacinia nulla. Aliquam quis purus in justo pulvinar tempor.
                                Aliquam tellus nulla, sollicitudin at euismod nec, feugiat
                                at nisi. Quisque vitae odio nec lacus interdum tempus.
                                Phasellus a rhoncus erat. Vivamus vel eros vitae est aliquet
                                pellentesque vitae et nunc. Sed vitae leo vitae nisl
                                pellentesque semper.
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
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ asset('/uploads/img/news-2.jpg') }}" alt />
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="{{ route('blog.details', ['slug' => 'fgwae']) }}">Cargo flow through
                                                better supply UK</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ asset('/uploads/img/news-1.jpg') }}" alt />
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="{{ route('blog.details', ['slug' => 'fgwae']) }}">Why is supply chain
                                                visibility so?</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ asset('/uploads/img/news-3.jpg') }}" alt />
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="{{ route('blog.details', ['slug' => 'fgwae']) }}">We very careful
                                                handling</a>
                                        </h3>
                                    </div>
                                </li>
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
