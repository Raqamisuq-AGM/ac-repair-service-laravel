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