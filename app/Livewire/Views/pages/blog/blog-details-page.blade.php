<div>
    <section class="page-title" style="background-image: url({{ asset('/uploads/img/page-title.jpg') }})">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Blogs</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index') }}" wire:navigate>Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
    </section>
    <livewire:components.blog.blog-detail lazy />
</div>