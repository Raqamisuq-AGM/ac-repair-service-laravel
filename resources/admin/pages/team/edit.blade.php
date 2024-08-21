@extends('partials.layout')

@section('title', 'Edit Team')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('team.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Edit Team</h3>
                <button type="submit" class="btn btn-primary me-4">Submit</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Basic</h3>
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $item->name }}" placeholder="Enter team name" />
                                @error('name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ $item->position }}" placeholder="Enter team position" />
                                @error('position')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="photo" class="form-label d-block">Avatar</label>
                                <img src="{{ asset($item->photo) }}" alt="" style="width: 150px">
                                <input class="form-control mt-2" type="file" id="photo" name="photo" />
                                @error('photo')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description">{{ $item->description }}</textarea>
                                @error('description')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                    value="{{ $item->whatsapp }}" placeholder="Enter whatsapp" />
                                @error('whatsapp')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    value="{{ $item->fb }}" placeholder="Enter facebook" />
                                @error('facebook')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    value="{{ $item->instagram }}" placeholder="Enter instagram" />
                                @error('instagram')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter"
                                    value="{{ $item->twitter }}" placeholder="Enter twitter" />
                                @error('twitter')
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
            $('#description').summernote({
                tabsize: 2,
                height: 500,
            });
        });
    </script>
@endsection
