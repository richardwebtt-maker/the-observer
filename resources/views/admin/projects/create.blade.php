@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
<div class="container py-5">
    <br><br><br><br>

    {{-- 🔴 Validation Error Messages --}}
    @if ($errors->any())
    <div class="alert alert-danger p-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.projects.partials.form', ['project' => null])

        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection