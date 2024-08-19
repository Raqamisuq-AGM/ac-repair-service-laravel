@extends('partials.layout')

@section('title')
    {{ 'About Company' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="#">
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
                                <input name="" id="company_name" class="form-control"
                                    value="{{ old('company_name') }}" />
                            </div>
                            {{-- @error('desc')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                            <div class="form-group mt-3">
                                <label for="tagline" class="form-label">Slogan/Tagline</label>
                                <input name="" id="tagline" class="form-control" value="{{ old('tagline') }}" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="" id="email" class="form-control" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                <input name="" id="whatsapp" class="form-control" value="{{ old('whatsapp') }}" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input name="" id="phone" class="form-control" value="{{ old('phone') }}" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="address" class="form-label">Address</label>
                                <input name="" id="address" class="form-control" value="{{ old('address') }}" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="logo" class="form-label">Logo</label>
                                <img src="{{ asset('/uploads/img/logo.png') }}" alt=""
                                    style="width: 150px;display:block" class="mb-1">
                                <input type="file" name="" id="logo" class="form-control" />
                            </div>
                            <div class="form-group mt-3">
                                <label for="favicon" class="form-label">Favicon</label>
                                <img src="{{ asset('/uploads/img/favicon.png') }}" alt=""
                                    style="width: 50px;display:block" class="mb-1">
                                <input type="file" name="" id="favicon" class="form-control" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mx-4 mb-4">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
