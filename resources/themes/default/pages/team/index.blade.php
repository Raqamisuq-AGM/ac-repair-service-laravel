@extends(themeView('partials.layout'))

@section('title')
    {{ 'Teams' }}
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
                <h1 class="title">Team</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Teams</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-section pb-90">
        <div class="auto-container">
            <div class="row">
                <div class="team-block col-lg-4 col-md-6 mt-2 mb-0 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('team.details', ['slug', 'gre']) }}"><img
                                        src="{{ asset('/uploads/img/team1-1.jpg') }}" alt /></a>
                            </figure>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="designation">Manager</span>
                            <h4 class="name">
                                <a href="{{ route('team.details', ['slug', 'gre']) }}">Kevin Martin</a>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="team-block mt-2 col-lg-4 col-md-6 mb-0 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('team.details', ['slug', 'gre']) }}"><img
                                        src="{{ asset('/uploads/img/team1-2.jpg') }}" alt /></a>
                            </figure>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="designation">Manager</span>
                            <h4 class="name">
                                <a href="{{ route('team.details', ['slug', 'gre']) }}">Richerd Fred</a>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="team-block mt-2 col-lg-4 col-md-6 mb-0 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('team.details', ['slug', 'gre']) }}"><img
                                        src="{{ asset('/uploads/img/team1-3.jpg') }}" alt /></a>
                            </figure>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="designation">Manager</span>
                            <h4 class="name">
                                <a href="{{ route('team.details', ['slug', 'gre']) }}">Jams Millard</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
