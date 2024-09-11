<div>
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Services</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index') }}" wire:navigate>Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </section>
    <livewire:components.home.home-meta title="Service" />
    <livewire:components.service.service lazy />
</div>