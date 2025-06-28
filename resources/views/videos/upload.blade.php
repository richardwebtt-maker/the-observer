@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Upload a New Video</h2>
    <form action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Video File</label>
            <input type="file" name="video" accept="video/*" required>
        </div>
        <button type="submit">Upload</button>
    </form>
</div>
@endsection
