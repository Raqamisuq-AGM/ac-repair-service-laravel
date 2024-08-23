@php
    $dataArray = json_decode($systemSeo->meta_keyword);
@endphp

@extends(themeView('partials.layout'))

@section('title')
    {{ 'Teams | ' }}{{ $systemSeo->meta_title }}
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
                @if ($teams->isNotEmpty())
                    @foreach ($teams as $team)
                        <div class="team-block col-lg-4 col-md-6 mt-2 mb-0 wow fadeInUp">
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

            <!-- Add pagination links here -->
            <div class="pagination-wrapper text-center">
                {{ $teams->onEachSide(1)->links() }}
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
