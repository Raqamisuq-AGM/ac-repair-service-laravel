<section class="innerpage">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="accordion-box skeleton-loader">
                    <li class="accordion block">
                        <div class="acc-btn justify-between">
                            <div class="skeleton skeleton-title" style="width:100%;"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">
                                    <div class="skeleton skeleton-paragraph"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="skeleton skeleton-title" style="width:100%;"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">
                                    <div class="skeleton skeleton-paragraph"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
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

    /* Skeleton styles */
    .skeleton {
        background-color: #e0e0e0;
        background-image: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
        background-size: 200% 100%;
        background-repeat: no-repeat;
        animation: shimmer 1.5s infinite linear;
        border-radius: 4px;
        display: inline-block;
    }

    /* Skeleton loader specific styles */
    .skeleton-loader {
        padding: 20px;
    }

    .skeleton-title {
        height: 30px;
        width: 70%;
        margin-bottom: 10px;
    }

    .skeleton-paragraph {
        height: 60px;
        width: 100%;
        margin-top: 10px;
    }

    .skeleton .icon {
        width: 30px;
        height: 30px;
        margin-left: auto;
        background-color: #e0e0e0;
    }
</style>
@endsection