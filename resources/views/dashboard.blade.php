@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h2 class="h5 mb-0">{{ __('Dashboard') }}</h2>
        </div>
        <div class="card-body">
            <p class="mb-0">{{ __("You're logged in!") }}</p>
        </div>
    </div>
</div>
@endsection
