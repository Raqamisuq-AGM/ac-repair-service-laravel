@extends('partials.layout')

@section('title')
    {{ 'Mails' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">View Mail</h5>
                        <a href="{{ route('contact_mail.all') }}" class="btn btn-primary me-4">
                            Back
                        </a>
                    </div>
                    <div class="container">
                        <p>Name: {{ $item->name }}</p>
                        <p>Email: {{ $item->email }}</p>
                        <p>Phone: {{ $item->phone }}</p>
                        <p>Subject: {{ $item->subject }}</p>
                        <p>Message: </p>
                        <p>{{ $item->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
