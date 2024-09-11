<section class="blog-details">
    <div class="container">
        <div class="row">
            <!-- Blog Details Section -->
            <div class="col-xl-8 col-lg-7">
                <div class="blog-details__left">
                    <div class="blog-details__img">
                        <!-- Shimmer Loader for Blog Image -->
                        <div class="shimmer shimmer-image"></div>
                        <div class="blog-details__date">
                            <span class="day shimmer shimmer-day"></span>
                            <span class="month shimmer shimmer-month"></span>
                        </div>
                    </div>
                    <div class="blog-details__content">
                        <!-- Shimmer Loader for Title -->
                        <h3 class="blog-details__title shimmer shimmer-title"></h3>
                        <!-- Shimmer Loader for Description -->
                        <p class="blog-details__text-2 shimmer shimmer-text"></p>
                    </div>
                </div>
            </div>

            <!-- Sidebar Section -->
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title shimmer shimmer-sidebar-title"></h3>
                        <ul class="sidebar__post-list list-unstyled">
                            <!-- Shimmer Loader for More Posts List -->
                            <li class="shimmer shimmer-post-item">
                                <div class="sidebar__post-image shimmer shimmer-post-image"></div>
                                <div class="sidebar__post-content">
                                    <h3 class="shimmer shimmer-post-title"></h3>
                                </div>
                            </li>
                            <!-- Repeat this shimmer loader for more posts until real data loads -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@section('styles')
<style>
    /* Shimmer animation */
    @keyframes shimmer {
        0% {
            background-position: -468px 0;
        }

        100% {
            background-position: 468px 0;
        }
    }

    /* General shimmer style */
    .shimmer {
        display: block;
        background: #f6f7f8;
        background-image: linear-gradient(to right,
                #f6f7f8 0%,
                #edeef1 20%,
                #f6f7f8 40%,
                #f6f7f8 100%);
        background-repeat: no-repeat;
        background-size: 1000px 100%;
        animation-duration: 1.5s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        animation-name: shimmer;
    }

    /* Shimmer for different sections of the blog details */
    .shimmer-image {
        width: 100%;
        height: 400px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .shimmer-title {
        width: 80%;
        height: 30px;
        margin-bottom: 15px;
        border-radius: 6px;
    }

    .shimmer-text {
        width: 100%;
        height: 150px;
        border-radius: 6px;
    }

    .shimmer-day,
    .shimmer-month {
        display: inline-block;
        width: 50px;
        height: 30px;
        border-radius: 4px;
    }

    .shimmer-sidebar-title {
        width: 60%;
        height: 25px;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    .shimmer-post-item {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .shimmer-post-image {
        width: 80px;
        height: 80px;
        border-radius: 6px;
        margin-right: 15px;
    }

    .shimmer-post-title {
        width: 80%;
        height: 20px;
        border-radius: 6px;
    }
</style>
@endsection