@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="container py-5">
    <br><br><br>
    <h2>Edit Project</h2>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.projects.partials.form', ['project' => $project])

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
