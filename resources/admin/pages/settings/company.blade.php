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
                        <button type="submit" class="btn btn-primary mx-4 mb-4">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
