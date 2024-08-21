@extends('partials.layout')

@section('title', 'Edit Services')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('service.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Edit Service</h3>
                <button type="submit" class="btn btn-primary me-4">Submit</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Basic</h3>
                            <div class="form-group">
                                <label for="status" class="form-label">Stauts</label>
                                <select name="status" class="form-control">
                                    <option value="0" {{ $item->status === 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="1" {{ $item->status === 'active' ? 'selected' : '' }}>Active
                                    </option>
                                </select>
                                @error('status')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $item->title }}" placeholder="Enter Service Title" />
                                @error('title')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="cover_photo" class="form-label d-block">Thumbnail</label>
                                <img src="{{ asset($item->cover_photo) }}" alt="" style="width: 150px">
                                <input class="form-control mt-2" type="file" id="cover_photo" name="cover_photo" />
                                @error('cover_photo')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="shortDesc" class="form-label">Short Description</label>
                                <textarea id="shortDesc" name="short_desc" cols="30" rows="10" class="form-control">{{ $item->short_desc }}</textarea>
                                @error('short_desc')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="desc" class="form-label">Description</label>
                                <textarea id="desc" name="desc">{{ $item->desc }}</textarea>
                                @error('desc')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
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
                                <input type="text" class="form-control" id="meta_title" name="meta_title"
                                    value="{{ $item->meta_title }}" placeholder="Enter Meta Title" />
                                @error('meta_title')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_author" class="form-label">Meta Author</label>
                                <input type="text" class="form-control" id="meta_author" name="meta_author"
                                    value="{{ $item->meta_author }}" placeholder="Enter Meta Author" />
                                @error('meta_author')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_og_thumb" class="form-label d-block">OG Thumbnail</label>
                                <img src="{{ asset($item->meta_og_thumb) }}" alt="" style="width: 150px">
                                <input class="form-control mt-2" type="file" id="meta_og_thumb" name="meta_og_thumb" />
                                @error('meta_og_thumb')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="TagifyBasic" class="form-label">Meta Keywords</label>
                                <input class="form-control" type="text" id="TagifyBasic" name="meta_tags"
                                    value="{{ $item->meta_tags }}" />
                                @error('meta_tags')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="meta_desc" class="form-label">Meta Description</label>
                                <textarea id="meta_desc" name="meta_desc" cols="30" rows="10" class="form-control">{{ $item->meta_desc }}</textarea>
                                @error('meta_desc')
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
