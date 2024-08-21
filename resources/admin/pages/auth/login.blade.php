@extends('partials.login')

@section('title')
    {{ 'Login' }}
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Welcome Back! 👋</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>

                        <form class="mb-3" action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                @error('invalid_credential')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
