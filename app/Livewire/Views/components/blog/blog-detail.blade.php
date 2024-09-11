<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blog-details__left">
                    <div class="blog-details__img">
                        <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt />
                        @php
                        $date = $blog->created_at;
                        $formattedDate = \Carbon\Carbon::parse($date);
                        $day = $formattedDate->format('d');
                        $month = $formattedDate->format('M');
                        @endphp
                        <div class="blog-details__date">
                            <span class="day">{{ $day }}</span>
                            <span class="month">{{ $month }}</span>
                        </div>
                    </div>
                    <div class="blog-details__content">
                        <h3 class="blog-details__title">
                            {{ $blog->title }}
                        </h3>
                        <p class="blog-details__text-2">
                            {!! $blog->desc !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">More Posts</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @if ($blogs->isNotEmpty())
                            @foreach ($blogs as $item)
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ asset('storage/'.$item->thumbnail) }}" alt />
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <a
                                            href="{{ route('blog.details', ['slug' => $item->slug]) }}" wire:navigate>{{ $item->title }}</a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
