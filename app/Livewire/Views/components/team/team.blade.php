<section class="team-section pb-90">
    <div class="auto-container">
        <div class="row">
            @if ($teams->isNotEmpty())
            @foreach ($teams as $team)
            <div class="team-block col-lg-4 col-md-6 mt-2 mb-0 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image">
                            <a href="{{ route('team.details', ['slug' => $team->slug]) }}" wire:navigate><img
                                    src="{{ asset('storage/'.$team->photo) }}" alt /></a>
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
                                href="{{ route('team.details', ['slug' => $team->slug]) }}" wire:navigate>{{ $team->name }}</a>
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <!-- Add pagination links here -->
        {{$teams->links('components.pagination.pagination')}}
    </div>
</section>