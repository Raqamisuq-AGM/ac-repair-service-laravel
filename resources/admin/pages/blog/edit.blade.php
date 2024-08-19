@extends('partials.layout')

@section('title')
    {{ 'Edit Blogs' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="#">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <h3>Edit Blogs</h3>
                <button type="submit" class="btn btn-primary me-4">Submit</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Basic</h3>
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" value="{{ old('title') }}"
                                    placeholder="John Doe" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" class="form-select form-select-lg" value="{{ old('category') }}">
                                    <option>Select Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="subCategory" class="form-label">Sub Category</label>
                                <select id="subCategory" class="form-select form-select-lg"
                                    value="{{ old('sub_category') }}">
                                    <option>Select Sub Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="thumb" class="form-label">Thumbnail</label>
                                <input class="form-control" type="file" id="thumb" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="shortDesc" class="form-label">Short Description</label>
                                <textarea name="" id="shortDesc" cols="30" rows="10" class="form-control">{{ old('short_desc') }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="desc" class="form-label">Description</label>
                                <textarea id="desc" name="desc">{{ old('desc') }}</textarea>
                                {{-- @error('desc')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>SEO Section</h3>
                            <div class="form-group">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" value="{{ old('meta_title') }}"
                                    placeholder="John Doe" />
                            </div>
                            <div class="form-group">
                                <label for="meta_author" class="form-label">Meta Author</label>
                                <input type="text" class="form-control" id="meta_author" value="{{ old('meta_author') }}"
                                    placeholder="John Doe" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_og_thumb" class="form-label">OG:Thambnail</label>
                                <input class="form-control" type="file" id="meta_og_thumb" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="TagifyBasic" class="form-label">Keywords</label>
                                <input class="form-control" type="file" id="TagifyBasic" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_tags" class="form-label">Meta Description</label>
                                <textarea name="" id="meta_tags" cols="30" rows="10" class="form-control">{{ old('meta_tags') }}</textarea>
                                {{-- @error('desc')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror --}}
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
    <link href="{{ asset('/backend/admin/assets/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
    <style>
        .panel-heading.note-toolbar {
            background: #232432 !important;
        }

        .ck-content {
            height: 500px;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('/backend/admin/assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('/backend/admin/assets/js/forms-tagify.js') }}"></script>
    <script src="{{ asset('/backend/admin/assets/summernote/popper.min.js') }}"></script>
    <script src="{{ asset('/backend/admin/assets/summernote/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/backend/admin/assets/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#desc').summernote({
                tabsize: 2,
                height: 500,
            });
        });
    </script>
@endsection
