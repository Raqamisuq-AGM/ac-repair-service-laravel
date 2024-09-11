<section class="service-section pt-150 pb-40">
    <div class="auto-container">
        <div class="row mt-20">
            <!-- Simulating three loading blocks -->
            <div class="service-block mb-80 col-md-6 col-lg-4">
                <div class="inner-box skeleton-box">
                    <div class="lower-content">
                        <div class="skeleton skeleton-button"></div>
                        <div class="skeleton skeleton-title"></div>
                        <div class="skeleton skeleton-text"></div>
                    </div>
                    <div class="image-box">
                        <figure class="skeleton skeleton-image"></figure>
                    </div>
                </div>
            </div>
            <div class="service-block mb-80 col-md-6 col-lg-4">
                <div class="inner-box skeleton-box">
                    <div class="lower-content">
                        <div class="skeleton skeleton-button"></div>
                        <div class="skeleton skeleton-title"></div>
                        <div class="skeleton skeleton-text"></div>
                    </div>
                    <div class="image-box">
                        <figure class="skeleton skeleton-image"></figure>
                    </div>
                </div>
            </div>
            <div class="service-block mb-80 col-md-6 col-lg-4">
                <div class="inner-box skeleton-box">
                    <div class="lower-content">
                        <div class="skeleton skeleton-button"></div>
                        <div class="skeleton skeleton-title"></div>
                        <div class="skeleton skeleton-text"></div>
                    </div>
                    <div class="image-box">
                        <figure class="skeleton skeleton-image"></figure>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simulating pagination loader -->
        <div class="pagination-wrapper text-center">
            <div class="skeleton skeleton-pagination"></div>
        </div>
    </div>
</section>

@section('styles')
<style>
    /* Shimmer animation */
    @keyframes shimmer {
        0% {
            background-position: -200px 0;
        }

        100% {
            background-position: 200px 0;
        }
    }

    /* General skeleton styles */
    .skeleton {
        background-color: #e0e0e0;
        background-image: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
        background-size: 200% 100%;
        background-repeat: no-repeat;
        animation: shimmer 1.5s infinite linear;
        border-radius: 4px;
    }

    /* Service section skeleton sizes */
    .skeleton-box {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 10px;
    }

    .skeleton-title {
        width: 60%;
        height: 20px;
        margin-bottom: 10px;
    }

    .skeleton-text {
        width: 80%;
        height: 15px;
        margin-bottom: 15px;
    }

    .skeleton-image {
        width: 100%;
        height: 200px;
        margin-top: 10px;
    }

    .skeleton-button {
        width: 40px;
        height: 40px;
        margin-bottom: 10px;
        border-radius: 50%;
    }

    .skeleton-pagination {
        width: 200px;
        height: 40px;
        margin: 0 auto;
        margin-top: 20px;
    }
</style>
@endsection