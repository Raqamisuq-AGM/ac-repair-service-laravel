{{-- @php
    $systemLogo = App\Models\SystemImage::where('type', 'logo')->first();
    $systemShortInfo = App\Models\SystemShortInfo::where('id', '1')->first();
@endphp --}}
<footer class="main-footer">
    <div class="bg footer-bg"></div>

    {{-- <div class="widgets-section">
        <div class="auto-container">
            <div class="row">
                <div class="footer-column col-sm-6 col-lg-4">
                    <div class="footer-widget about-widget">
                        <div class="logo-box" style="max-width:165px;">
                            <img src="{{ asset($systemLogo->file) }}" alt />
                        </div>
                        <ul class="list-style-two">
                            <li>
                                <a href="tel:+1234567890"><i class="fa-regular fa-phone-volume fa-fw"></i>
                                    {{ $systemShortInfo->phone }}</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-regular fa-envelope fa-fw"></i>
                                    <span>{{ $systemShortInfo->email }}</span></a>
                            </li>
                        </ul>
                        <ul class="social-icon-two">
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-sm-6 col-lg-4">
                    <div class="footer-widget about-widget">
                        <h4 class="widget-title">Links</h4>
                        <ul class="user-links">
                            <li><a href="#">AC Maintenance</a></li>
                            <li><a href="#">Dust Cleaning</a></li>
                            <li><a href="#">Heating Services</a></li>
                            <li><a href="#">HVAC Installation</a></li>
                            <li><a href="#">Heating and Water</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-sm-6 col-lg-4 ps-xl-0">
                    <div class="footer-widget lnews-widget">
                        <h4 class="widget-title">Latest News</h4>
                        <div class="widget-content">
                            <div class="post-item">
                                <div class="post-thumb">
                                    <img class="rounded-circle" src="{{ asset('/uploads/img/news-1.jpg') }}" alt />
                                </div>
                                <ul class="post-right">
                                    <li class="d-flex align-items-center posted-date mb-2">
                                        <i class="far fa-calendar-days me-2"></i>
                                        <a class="entry-date" href>April 17, 2024</a>
                                    </li>
                                    <li class="title-holder">
                                        <h6 class="entry-title">
                                            <a href>How To Solve Less Cooling Problems In AC</a>
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-item">
                                <div class="post-thumb">
                                    <img class="rounded-circle" src="{{ asset('/uploads/img/news-2.jpg') }}" alt />
                                </div>
                                <ul class="post-right">
                                    <li class="d-flex align-items-center posted-date mb-2">
                                        <i class="far fa-calendar-days me-2"></i>
                                        <a class="entry-date" href>April 17, 2024</a>
                                    </li>
                                    <li class="title-holder">
                                        <h6 class="entry-title">
                                            <a href>How to Make Your Home More Sustainable</a>
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-container">
                <div class="copyright-text">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All Rights reserved
                </div>
            </div>
        </div>
    </div>
</footer>
