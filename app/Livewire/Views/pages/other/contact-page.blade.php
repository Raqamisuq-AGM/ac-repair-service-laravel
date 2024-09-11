<div>
    <livewire:components.home.home-meta title="Contact Us" />
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Contact us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index') }}" wire:navigate>Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-details__right">
                        <div class="sec-title">
                            <span class="sub-title">Need any help?</span>
                            <h2>Get in touch with us</h2>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-phone-plus"></span>
                                </div>
                                <div class="text">
                                    <h6>Have any question?</h6>
                                    <a href="tel:{{ $systemInfo->phone }}"><span>Free</span> {{ $systemInfo->phone }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="lnr-icon-envelope1"></span>
                                </div>
                                <div class="text">
                                    <h6>Write email</h6>
                                    <a href="#"><span>{{ $systemInfo->email }}</span></a>
                                </div>
                            </li>
                            <li style="display: -webkit-inline-box;">
                                <div class="icon">
                                    <span class="lnr-icon-location"></span>
                                </div>
                                <div class="text" style="max-width: 250px;">
                                    <h6>Visit anytime</h6>
                                    <span>{{ $systemInfo->address }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="sec-title">
                        <span class="sub-title">Send us email</span>
                        <h2>Schedule Appointment</h2>
                    </div>

                    <div class="form-column col-lg-12">
                        <div class="inner-column">
                            <div class="form-outer">
                                <div class="contact-form wow fadeInLeft">
                                    <div class="sec-title mb-15">
                                        <span class="sub-title">GET A QUOTE</span>
                                        <h2>Get in touch with us</h2>
                                    </div>

                                    <form wire:submit.prevent="submitForm" id="contact_form" name="contact_form">
                                        @csrf
                                        <div class="row">
                                            <!-- Name -->
                                            <div class="col-md-6 form-group">
                                                <input type="text" wire:model="name" placeholder="Your Name" />
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-6 form-group">
                                                <input type="email" wire:model="email" placeholder="Your Email" />
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Subject -->
                                            <div class="col-md-6 form-group">
                                                <input type="text" wire:model="subject" placeholder="Subject" />
                                                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-md-6 form-group">
                                                <input type="text" wire:model="phone" placeholder="Phone No" />
                                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Message -->
                                            <div class="col-md-12 form-group">
                                                <textarea wire:model="message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                                                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <!-- Submit button -->
                                            <div class="col-lg-12 form-group">
                                                <input name="form_botcheck" class="form-control" type="hidden" value />
                                                <button type="submit" class="theme-btn btn-style-one hvr-light">
                                                    <span class="btn-title" wire:loading.remove>Send message</span>
                                                    <span class="btn-title" wire:loading>Sending...</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>