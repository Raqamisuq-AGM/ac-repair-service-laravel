<section class="news-section pb-70">
    <div class="auto-container">
        <div class="row">
            @if ($blogs->isNotEmpty())
            @foreach ($blogs as $blog)
            <div class="news-block col-lg-4 col-md-6 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image">
                            <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" wire:navigate>
                                <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt />
                            </a>
                        </figure>
                        @php
                        $date = $blog->created_at; // Your datetime string
                        $formattedDate = \Carbon\Carbon::parse($date); // Parse the date string using Carbon
                        $day = $formattedDate->format('d'); // Get the day of the month
                        $month = $formattedDate->format('M'); // Get the abbreviated month name
                        @endphp
                        <span class="date">{{ $day }} <span
                                class="month">{{ $month }}</span></span>
                    </div>
                    <div class="lower-content">
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" wire:navigate
                                style="color: inherit;
                                                    overflow: hidden;
                                                    -webkit-line-clamp: 2;
                                                    display: box;
                                                    display: -webkit-box;
                                                    -webkit-box-orient: vertical;
                                                    text-overflow: ellipsis;
                                                    white-space: normal;">
                                {{ $blog->title }}
                            </a>
                        </h4>
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" wire:navigate class="read-more">
                            Read More <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <!-- Add pagination links here -->
        {{$blogs->links('components.pagination.pagination')}}
    </div>
</section>