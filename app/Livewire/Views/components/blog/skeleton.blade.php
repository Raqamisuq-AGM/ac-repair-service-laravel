<section class="news-section pb-70">
    <div class="auto-container">
        <div class="row">
            <!-- Loop through blog posts, this will be repeated for each blog post -->
            <div class="news-block col-lg-4 col-md-6 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <!-- Shimmer effect for image placeholder -->
                        <div class="shimmer shimmer-image"></div>
                    </div>
                    <div class="lower-content">
                        <!-- Shimmer effect for title -->
                        <div class="shimmer shimmer-title"></div>
                        <!-- Shimmer effect for read more button -->
                        <div class="shimmer shimmer-button"></div>
                    </div>
                </div>
            </div>
            <!-- End of blog post loop -->
        </div>

        <!-- Pagination section -->
        <div class="pagination-wrapper text-center">
            <div class="shimmer shimmer-pagination"></div>
        </div>
    </div>
</section>

@section('styles')
<style>
    /* Basic Styles */
    .news-block {
        margin-bottom: 30px;
    }

    /* Shimmer animation */
    @keyframes shimmer {
        0% {
            background-position: -468px 0;
        }

        100% {
            background-position: 468px 0;
        }
    }

    /* Shimmer placeholder common styles */
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

    /* Placeholder for the image box */
    .shimmer-image {
        width: 100%;
        height: 200px;
        border-radius: 8px;
    }

    /* Placeholder for the title */
    .shimmer-title {
        width: 80%;
        height: 20px;
        margin: 10px 0;
        border-radius: 4px;
    }

    /* Placeholder for the read more button */
    .shimmer-button {
        width: 50%;
        height: 15px;
        margin-top: 5px;
        border-radius: 4px;
    }

    /* Pagination loader */
    .shimmer-pagination {
        width: 200px;
        height: 20px;
        margin: 20px auto;
        border-radius: 4px;
    }
</style>
@endsection