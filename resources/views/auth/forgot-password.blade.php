@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h4 class="mb-3">Forgot Password</h4>
    <p class="text-muted">
        {{ __('Forgot your password? No problem. Just let us know your email and we’ll send you a reset link.') }}
    </p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror" required autofocus>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
    </form>
</div>
@endsection
