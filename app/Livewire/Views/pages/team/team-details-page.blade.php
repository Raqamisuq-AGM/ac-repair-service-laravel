<div>
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Teams</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index') }}" wire:navigate>Home</a></li>
                    <li>Teams</li>
                </ul>
            </div>
        </div>
    </section>
    <livewire:components.team.team-detail lazy />
</div>