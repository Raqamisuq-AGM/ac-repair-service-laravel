@extends('partials.layout')

@section('title')
    {{ 'Custom Heasder & Footer Code' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('settings.custom.code.update') }}" method="post">
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
                                <textarea name="header" id="header" cols="30" rows="10" class="form-control">{{ $item->header }}</textarea>
                                @error('header')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="footer" class="form-label">Footer Code</label>
                                <textarea name="footer" id="footer" cols="30" rows="10" class="form-control">{{ $item->footer }}</textarea>
                                @error('footer')
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
