@extends('partials.layout')

@section('title')
    {{ 'Change Email' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="#">
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
                                <label for="old_password" class="form-label">Old Password</label>
                                <input name="" id="old_password" class="form-control"
                                    value="{{ old('old_password') }}" />
                            </div>
                            {{-- @error('desc')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                            <div class="form-group mt-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input name="" id="new_password" class="form-control"
                                    value="{{ old('new_password') }}" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input name="" id="confirm_password" class="form-control"
                                    value="{{ old('confirm_password') }}" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mx-4 mb-4">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
