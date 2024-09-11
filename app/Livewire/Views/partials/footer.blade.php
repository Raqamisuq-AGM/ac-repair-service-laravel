<footer class="main-footer">
    <div class="bg footer-bg"></div>

    <div class="widgets-section">
        <div class="auto-container">
            <div class="row">
                <div class="footer-column col-sm-6 col-lg-4">
                    <div class="footer-widget about-widget">
                        <h4 class="widget-title">Use-full Links</h4>
                        <ul class="user-links">
                            <li><a href="{{route('service')}}" wire:navigate>Services</a></li>
                            <li><a href="{{route('about')}}" wire:navigate>About Us</a></li>
                            <li><a href="{{route('contact')}}" wire:navigate>Schedule Appointment</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-sm-6 col-lg-4">
                    <div class="footer-widget about-widget">
                        <h4 class="widget-title">Follow Us On</h4>
                        <ul class="social-icon-two">
                            @if ($systemShortInfo->twitter !== null)
                            <li>
                                <a href="{{$systemShortInfo->twitter}}"><i class="fab fa-twitter"></i></a>
                            </li>
                            @endif

                            @if ($systemShortInfo->fb !== null)
                            <li>
                                <a href="{{$systemShortInfo->fb}}"><i class="fab fa-facebook"></i></a>
                            </li>
                            @endif

                            @if ($systemShortInfo->youtube !== null)
                            <li>
                                <a href="{{$systemShortInfo->youtube}}"><i class="fab fa-youtube"></i></a>
                            </li>
                            @endif

                            @if ($systemShortInfo->linkedin !== null)
                            <li>
                                <a href="{{$systemShortInfo->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="footer-column col-sm-6 col-lg-4 ps-xl-0">
                    <div class="footer-widget lnews-widget">
                        <h4 class="widget-title">Company</h4>
                        <div class="widget-content">
                            <ul class="list-style-two">
                                <li>
                                    <a href="tel:{{$systemShortInfo->phone}}">
                                        <i class="fa-regular fa-phone-volume fa-fw"></i>
                                        {{$systemShortInfo->phone}}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-regular fa-envelope fa-fw"></i>
                                        {{$systemShortInfo->email}}
                                    </a>
                                </li>
                                <li>
                                    <a href="t#">
                                        <i class="fa-regular fa-location-dot fa-fw"></i>
                                        {{$systemShortInfo->address}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-container">
                <div class="copyright-text">
                    © All Rights reserved | Comfort AC
                </div>
            </div>
        </div>
    </div>
</footer>