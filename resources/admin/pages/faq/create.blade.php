@extends('partials.layout')

@section('title')
    {{ 'Create Faqs' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('faq.store') }}" method="post">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
                <h3>Create Faqs</h3>
                <button type="submit" class="btn btn-primary me-4">Submit</button>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ques" class="form-label">Question</label>
                                <input type="text" class="form-control" id="ques" value="{{ old('question') }}"
                                    placeholder="Enter question" name='question' />
                                @error('question')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="ans" class="form-label">Answer</label>
                                <textarea name="answer" id="ans" cols="30" rows="10" class="form-control">{{ old('answer') }}</textarea>
                                @error('answer')
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
