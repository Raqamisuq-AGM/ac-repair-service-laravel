<section class="team-details">
    <div class="container pb-100">
        <div class="team-details__top pb-70">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__top-left">
                        <div class="team-details__top-img skeleton-box">
                            <div class="skeleton skeleton-image"></div>
                            <div class="skeleton skeleton-big-text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__top-right">
                        <div class="team-details__top-content">
                            <h3 class="team-details__top-name skeleton skeleton-title"></h3>
                            <p class="team-details__top-title skeleton skeleton-text"></p>
                            <div class="team-details__social skeleton skeleton-social"></div>
                            <p class="team-details__top-text-3 skeleton skeleton-paragraph"></p>
                        </div>
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

    /* Team details skeleton styles */
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

    .skeleton-big-text {
        width: 60%;
        height: 30px;
        margin-top: 20px;
        border-radius: 4px;
    }

    .skeleton-title {
        width: 80%;
        height: 25px;
        margin: 10px 0;
    }

    .skeleton-text {
        width: 60%;
        height: 20px;
        margin: 5px 0;
    }

    .skeleton-social {
        width: 150px;
        height: 20px;
        margin: 10px 0;
    }

    .skeleton-paragraph {
        width: 100%;
        height: 100px;
        margin-top: 20px;
        border-radius: 4px;
    }
</style>
@endsection