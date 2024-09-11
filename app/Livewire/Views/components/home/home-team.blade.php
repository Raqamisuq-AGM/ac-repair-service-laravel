<section class="team-section pb-80 pb-md-30">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6"></div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="sec-title mb-30">
                    <span class="sub-title">Our Expert Members</span>
                    <h2>
                        Professional <br /><span class="color1">Expert</span> Team
                    </h2>
                </div>
                <a href="{{ route('team') }}" class="theme-btn btn-style-one mb-50"><span class="btn-title">Discover
                        More</span></a>
            </div>
            <div class="col-lg-8">
                <div class="home1-team-slider mt-md-30 owl-carousel owl-theme">
                    @if ($teams->isNotEmpty())
                    @foreach ($teams as $team)
                    <div class="team-block mt-2 mb-0 wow fadeInUp">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ route('team.details', ['slug' => $team->slug]) }}"><img
                                            src="{{ asset($team->photo) }}" alt /></a>
                                </figure>
                                <div class="social-links">
                                    <a href="{{ $team->fb }}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ $team->whatsapp }}"><i class="fab fa-whatsapp"></i></a>
                                    <a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="info-box">
                                <span class="designation">{{ $team->position }}</span>
                                <h4 class="name">
                                    <a
                                        href="{{ route('team.details', ['slug' => $team->slug]) }}">{{ $team->name }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>