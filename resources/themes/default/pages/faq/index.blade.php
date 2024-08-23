@php
    $dataArray = json_decode($systemSeo->meta_keyword);
@endphp

@extends(themeView('partials.layout'))

@section('title')
    {{ 'Faqs | ' }}{{ $systemSeo->meta_title }}
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
    {{ asset($systemSeo->meta_og_thumb) }}
@endsection
@section('twitter_image')
    {{ asset($systemSeo->meta_og_thumb) }}
@endsection

@section('content')
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Faqs</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Faqs</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="innerpage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="accordion-box wow fadeInRight">
                        @if ($faqs->isNotEmpty())
                            @foreach ($faqs as $faq)
                                <li class="accordion block {{ $loop->first ? 'active-block' : '' }}">
                                    <div class="acc-btn {{ $loop->first ? 'active' : '' }}">
                                        {{ $faq->ques }}
                                        <div class="icon fa fa-plus"></div>
                                    </div>
                                    <div class="acc-content {{ $loop->first ? 'current' : '' }}">
                                        <div class="content">
                                            <div class="text">
                                                {{ $faq->ans }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </section>
@endsection
