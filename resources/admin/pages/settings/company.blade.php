@extends('partials.layout')

@section('title')
    {{ 'About Company' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('settings.company.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <h3>About Company</h3>
                <button type="submit" class="btn btn-primary me-4">Submit</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input name="company_name" id="company_name" class="form-control"
                                    value="{{ $company->company_name }}" />
                                @error('company_name')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="tagline" class="form-label">Slogan/Tagline</label>
                                <input name="tagline" id="tagline" class="form-control" value="{{ $company->tagline }}" />
                                @error('tagline')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" id="email" class="form-control" value="{{ $company->email }}" />
                                @error('email')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                <input name="whatsapp" id="whatsapp" class="form-control"
                                    value="{{ $company->whatsapp }}" />
                                @error('whatsapp')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input name="phone" id="phone" class="form-control" value="{{ $company->phone }}" />
                                @error('phone')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="address" class="form-label">Address</label>
                                <input name="address" id="address" class="form-control"
                                    value="{{ $company->address }}" />
                                @error('address')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="logo" class="form-label">Logo</label>
                                <img src="{{ asset($systemLogo->file) }}" alt="" style="width: 150px;display:block"
                                    class="mb-1">
                                <input type="file" name="logo" id="logo" class="form-control" />
                                @error('logo')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="favicon" class="form-label">Favicon</label>
                                <img src="{{ asset($systemFavicon->file) }}" alt=""
                                    style="width: 50px;display:block" class="mb-1">
                                <input type="file" name="favicon" id="favicon" class="form-control" />
                                @error('favicon')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-body">
                            <h3>SEO</h3>
                            <div class="form-group mt-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input name="meta_title" id="meta_title" class="form-control"
                                    value="{{ $companySeo->meta_title }}" />
                                @error('meta_title')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_author" class="form-label">Author</label>
                                <input name="meta_author" id="meta_author" class="form-control"
                                    value="{{ $companySeo->meta_author }}" />
                                @error('meta_author')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_desc" class="form-label">Meta Description</label>
                                <textarea name="meta_desc" id="meta_desc" cols="30" rows="10" class="form-control">{{ $companySeo->meta_desc }}</textarea>
                                @error('meta_desc')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="TagifyBasic" class="form-label">Meta Keywords</label>
                                <input name="meta_keyword" id="TagifyBasic" class="form-control"
                                    value="{{ $companySeo->meta_keyword }}" />
                                @error('meta_keyword')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_og_thumb" class="form-label">OG Thumbnail</label>
                                <img src="{{ asset($companySeo->meta_og_thumb) }}" alt=""
                                    style="width: 150px;display:block" class="mb-1">
                                <input class="form-control" type="file" id="meta_og_thumb" name="meta_og_thumb" />
                                @error('meta_og_thumb')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mx-4 mb-4">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection



@section('style')
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/libs/tagify/tagify.css') }}" />
@endsection

@section('scripts')
    <script src="{{ asset('/backend/admin/assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('/backend/admin/assets/js/forms-tagify.js') }}"></script>
    <script src="{{ asset('/backend/admin/assets/summernote/popper.min.js') }}"></script>
    <script src="{{ asset('/backend/admin/assets/summernote/bootstrap.min.js') }}"></script>
@endsection
