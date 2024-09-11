<section class="team-details">
    <div class="container pb-100">
        <div class="team-details__top pb-70">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__top-left">
                        <div class="team-details__top-img">
                            <img src="{{ asset('storage/'.$team->photo) }}" alt />
                            <div class="team-details__big-text">Richerd</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__top-right">
                        <div class="team-details__top-content">
                            <h3 class="team-details__top-name">{{ $team->name }}</h3>
                            <p class="team-details__top-title">
                                {{ $team->position }}
                            </p>
                            <div class="team-details__social">
                                <a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $team->fb }}"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $team->whatsapp }}"><i class="fab fa-whatsapp"></i></a>
                                <a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                            </div>
                            <p class="team-details__top-text-3">
                                {!! $team->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>