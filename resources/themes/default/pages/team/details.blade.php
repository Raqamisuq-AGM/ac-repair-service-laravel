@php
    $dataArray = json_decode($systemSeo->meta_keyword);
@endphp

@extends(themeView('partials.layout'))

@section('title')
    {{ $team->name }}{{ ' | ' . $systemSeo->meta_title }}
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
    {{ $team->photo }}
@endsection
@section('twitter_image')
    {{ $team->photo }}
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
                                <img src="{{ asset($team->photo) }}" alt />
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
@endsection
