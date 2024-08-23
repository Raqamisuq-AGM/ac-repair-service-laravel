@extends('partials.layout')

@section('title')
    {{ 'Categories' }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @livewire('CategoryComponent')
        </div>
    </div>
@endsection
