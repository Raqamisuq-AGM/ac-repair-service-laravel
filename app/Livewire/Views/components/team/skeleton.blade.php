<section class="team-section pb-90">
    <div class="auto-container">
        <div class="row">
            <!-- Skeleton Loader Placeholder -->
            <div class="team-block col-lg-4 col-md-6 mt-2 mb-0">
                <div class="inner-box skeleton-box">
                    <div class="image-box">
                        <figure class="skeleton skeleton-image"></figure>
                        <div class="social-links skeleton skeleton-social"></div>
                    </div>
                    <div class="info-box">
                        <span class="skeleton skeleton-text skeleton-designation"></span>
                        <h4 class="name skeleton skeleton-title"></h4>
                    </div>
                </div>
            </div>
            <div class="team-block col-lg-4 col-md-6 mt-2 mb-0">
                <div class="inner-box skeleton-box">
                    <div class="image-box">
                        <figure class="skeleton skeleton-image"></figure>
                        <div class="social-links skeleton skeleton-social"></div>
                    </div>
                    <div class="info-box">
                        <span class="skeleton skeleton-text skeleton-designation"></span>
                        <h4 class="name skeleton skeleton-title"></h4>
                    </div>
                </div>
            </div>
            <div class="team-block col-lg-4 col-md-6 mt-2 mb-0">
                <div class="inner-box skeleton-box">
                    <div class="image-box">
                        <figure class="skeleton skeleton-image"></figure>
                        <div class="social-links skeleton skeleton-social"></div>
                    </div>
                    <div class="info-box">
                        <span class="skeleton skeleton-text skeleton-designation"></span>
                        <h4 class="name skeleton skeleton-title"></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simulated pagination loader -->
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

    /* Team section skeleton sizes */
    .skeleton-box {
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .skeleton-image {
        width: 100%;
        height: 250px;
        margin-bottom: 15px;
        border-radius: 8px;
    }

    .skeleton-social {
        width: 100px;
        height: 20px;
        margin: 10px auto;
    }

    .skeleton-title {
        width: 60%;
        height: 20px;
        margin: 10px 0;
    }

    .skeleton-designation {
        width: 40%;
        height: 15px;
        margin-bottom: 10px;
    }

    .skeleton-pagination {
        width: 200px;
        height: 40px;
        margin: 20px auto;
    }
</style>
@endsection