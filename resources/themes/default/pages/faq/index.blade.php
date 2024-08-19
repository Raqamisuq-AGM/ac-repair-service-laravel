@extends(themeView('partials.layout'))

@section('title')
    {{ 'Faqs' }}
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
                <div class="col-md-6">
                    <ul class="accordion-box wow fadeInRight">
                        <li class="accordion block active-block">
                            <div class="acc-btn active">
                                How to soft launch your business?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content current">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block">
                            <div class="acc-btn">
                                Is my technology allowed on tech?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block">
                            <div class="acc-btn">
                                How to turn visitors into contributors
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block mb-0">
                            <div class="acc-btn">
                                How can i find my solutions?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="accordion-box wow fadeInRight">
                        <li class="accordion block">
                            <div class="acc-btn">
                                How to soft launch your business?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block active-block">
                            <div class="acc-btn active">
                                Is my technology allowed on tech?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content current">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block">
                            <div class="acc-btn">
                                How to turn visitors into contributors
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="accordion block mb-0">
                            <div class="acc-btn">
                                How can i find my solutions?
                                <div class="icon fa fa-plus"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        There are many variations of passages the majority have
                                        suffered alteration in some fo injected humour or random
                                        ised words believ able lorem Ipsum generators on the
                                        internet tend to repeat predefined chunks as necessary.
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
