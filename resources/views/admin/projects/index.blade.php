@extends('layouts.app')

@section('title', 'Project Dashboard')

@section('content')
<div class="container py-5">
<br><br><br><br>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Add New Project</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Category</th>
                <th>Client</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td><img src="{{ asset('storage/' . $project->thumbnail) }}" width="80"></td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->category }}</td>
                <td>{{ $project->client }}</td>
                <td>{{ $project->project_date }}</td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Delete this project?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
