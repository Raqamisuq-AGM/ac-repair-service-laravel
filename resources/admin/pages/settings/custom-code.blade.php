@extends('partials.layout')

@section('title')
    {{ 'Custom Heasder & Footer Code' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="#">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <h3>Custom Heasder & Footer Code</h3>
                <button type="submit" class="btn btn-primary me-4">Submit</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-3">
                                <label for="header" class="form-label">Header Code</label>
                                <textarea name="" id="header" cols="30" rows="10" class="form-control">{{ old('header') }}</textarea>
                            </div>
                            {{-- @error('desc')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                            <div class="form-group mt-3">
                                <label for="footer" class="form-label">Footer Code</label>
                                <textarea name="" id="footer" cols="30" rows="10" class="form-control">{{ old('footer') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mx-4 mb-4">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
