@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 h4">{{ __('Profile') }}</h2>

    <div class="row gy-4">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-danger shadow-sm">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
