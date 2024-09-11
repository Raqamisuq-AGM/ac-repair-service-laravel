<section class="services-details">
    <div class="container">
        <div class="row">
            <!-- Service Details Content -->
            <div class="col-xl-8 col-lg-8">
                <div class="services-details__content">
                    <!-- Loader for Service Title and Description -->
                    <div class="skeleton skeleton-title"></div>
                    <div class="skeleton skeleton-text"></div>
                </div>
            </div>

            <!-- Sidebar Section -->
            <div class="col-xl-4 col-lg-4">
                <div class="service-sidebar">
                    <div class="sidebar-widget service-sidebar-single">
                        <div class="skeleton skeleton-box"></div>
                        <div class="skeleton skeleton-phone"></div>
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

    /* Skeleton shimmer style */
    .skeleton {
        background-color: #e0e0e0;
        background-image: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
        background-size: 200% 100%;
        background-repeat: no-repeat;
        animation: shimmer 1.5s infinite linear;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    /* Specific sizes for skeleton elements */
    .skeleton-title {
        width: 60%;
        height: 30px;
        margin-bottom: 20px;
    }

    .skeleton-text {
        width: 100%;
        height: 150px;
    }

    .skeleton-box {
        width: 100%;
        height: 100px;
        margin-bottom: 20px;
    }

    .skeleton-phone {
        width: 50%;
        height: 20px;
        margin: 0 auto;
    }
</style>
@endsection