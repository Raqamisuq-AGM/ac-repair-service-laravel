@extends('partials.layout')

@section('title')
    {{ 'Change Email' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('settings.changeEmailUpdate') }}" method="post">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <h3>Change Email</h3>
                <button type="submit" class="btn btn-primary me-4">Submit</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-3">
                                <label for="old_email" class="form-label">Old Email</label>
                                <input name="old_email" id="old_email" class="form-control"
                                    value="{{ old('old_email') }}" />
                                @error('old_email')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="new_email" class="form-label">New Email</label>
                                <input name="new_email" id="new_email" class="form-control"
                                    value="{{ old('new_email') }}" />
                                @error('new_email')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="confirm_email" class="form-label">Confirm Email</label>
                                <input name="confirm_email" id="confirm_email" class="form-control"
                                    value="{{ old('confirm_email') }}" />
                                @error('confirm_email')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
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
