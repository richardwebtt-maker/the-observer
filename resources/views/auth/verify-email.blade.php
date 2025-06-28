@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h4 class="mb-3">Verify Your Email</h4>

    <p class="text-muted">
        {{ __('Thanks for signing up! Before getting started, please verify your email by clicking the link we just sent. Didn’t receive it?') }}
    </p>

    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">
            {{ __('A new verification link has been sent to your email.') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">{{ __('Resend Verification Email') }}</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">{{ __('Log Out') }}</button>
        </form>
    </div>
</div>
@endsection
