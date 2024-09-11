<section class="contact-section">
    <div class="bg bg-img4"></div>
    <div class="outer-box mx-auto">
        <div class="auto-container">
            <div class="row">
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
                <!-- <div class="content-column col-lg-6">
                    <div class="feature-box">
                        <div class="box-wrapper">
                            <i class="icon flaticon-ac1-mechanic"></i>
                            <div class="icon-text">
                                <h5 class="title">
                                    Our Dedicated Team Is Ready To Help You!
                                </h5>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>