@extends(themeView('partials.layout'))

@section('title')
    {{ 'Team Details' }}
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
                <h1 class="title">Team Details</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Team Details</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="team-details">
        <div class="container pb-100">
            <div class="team-details__top pb-70">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__top-left">
                            <div class="team-details__top-img">
                                <img src="{{asset('/uploads/img/team-details.jpg')}}" alt />
                                <div class="team-details__big-text">Richerd</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__top-right">
                            <div class="team-details__top-content">
                                <h3 class="team-details__top-name">Richerd Fred</h3>
                                <p class="team-details__top-title">
                                    Managing Director & CEO
                                </p>
                                <div class="team-details__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                                <p class="team-details__top-text-1">
                                    I help my clients stand out and <br />
                                    they help me grow.
                                </p>
                                <p class="team-details__top-text-3">
                                    Lorem ipsum is simply free text used by copytyping
                                    refreshing. Neque porro est qui dolorem ipsum quia quaed
                                    inventore veritatis et quasi architecto beatae
                                </p>
                                <p class="team-details__top-text-2">
                                    When an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has survived
                                    not only five centuries architecto
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-details__bottom pt-100">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__bottom-left">
                            <h4 class="team-details__bottom-left-title">
                                Personal Experience
                            </h4>
                            <p class="team-details__bottom-left-text">
                                When an unknown printer took a galley of type and scrambled
                                it to make a type specimen book. It has survived not only
                                five centuries architecto dolorem ipsum quia
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__bottom-right">
                            <div class="team-details__progress">
                                <div class="team-details__progress-single">
                                    <h4 class="team-details__progress-title">Marketing</h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="90%">
                                            <div class="count-text">90%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-details__progress-single">
                                    <h4 class="team-details__progress-title">Farming</h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="46%">
                                            <div class="count-text">76%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-details__progress-single">
                                    <h4 class="team-details__progress-title">Business</h4>
                                    <div class="bar marb-0">
                                        <div class="bar-inner count-bar" data-percent="60%">
                                            <div class="count-text">60%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
