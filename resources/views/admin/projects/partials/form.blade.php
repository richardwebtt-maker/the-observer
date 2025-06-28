<div class="form-group mb-3">
    <label>Short Title</label>
    <input type="text" name="short_title" class="form-control"
        value="{{ old('short_title', $project->short_title ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $project->title ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label>Short Description</label>
    <input type="text" name="short_description" class="form-control"
        value="{{ old('short_description', $project->short_description ?? '') }}">
</div>

<div class="form-group mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control"
        rows="5">{{ old('description', $project->description ?? '') }}</textarea>
</div>

@php
$categories = ['Web Design', 'Photography', 'Videography'];
$categoryFilters = [
'filter-web' => 'Website',
'filter-vid' => 'Video',
'filter-pic' => 'Pictures'
];
@endphp

<div class="form-group mb-3">
    <label>Category</label>
    <div>
        @foreach($categories as $cat)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="category" id="category_{{ $loop->index }}"
                value="{{ $cat }}" {{ old('category', $project->category ?? '') == $cat ? 'checked' : '' }}>
            <label class="form-check-label" for="category_{{ $loop->index }}">{{ $cat }}</label>
        </div>
        @endforeach
    </div>
</div>

<div class="form-group mb-3">
    <label>Category Filter</label>
    <div>
        @foreach($categoryFilters as $value => $label)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="category_filter" id="filter_{{ $loop->index }}"
                value="{{ $value }}" {{ old('category_filter', $project->category_filter ?? '') == $value ? 'checked' :
            '' }}>
            <label class="form-check-label" for="filter_{{ $loop->index }}">{{ $label }}</label>
        </div>
        @endforeach
    </div>
</div>

<div class="form-group mb-3">
    <label>Client</label>
    <input type="text" name="client" class="form-control" value="{{ old('client', $project->client ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label>Project Date</label>
    <input type="date" name="project_date" class="form-control"
        value="{{ old('project_date', $project->project_date ?? '') }}">
</div>

<div class="form-group mb-3">
    <label>Project URL</label>
    <input type="text" name="project_url" class="form-control"
        value="{{ old('project_url', $project->project_url ?? '') }}">
</div>

<div class="form-group mb-3">
    <label>Thumbnail (image)</label>
    <input type="file" name="thumbnail" class="form-control">
    @if(!empty($project) && $project->thumbnail)
    <img src="{{ asset('storage/' . $project->thumbnail) }}" class="mt-2" width="100">
    @endif

</div>

<div class="form-group mb-3">
    <label>Gallery Images</label>
    <input type="file" name="images[]" class="form-control" multiple>

    @if (!empty($project) && $project->images)
    <div id="sortable-images" class="mt-3 d-flex flex-wrap gap-2">
        @foreach (json_decode($project->images, true) as $image)
        <div class="sortable-image position-relative" data-image="{{ $image }}">
            <img src="{{ asset('storage/' . $image) }}" width="100" class="img-thumbnail">

            <!-- 🗑 Delete button -->
            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image"
                data-image="{{ $image }}" style="z-index: 2;">
                &times;
            </button>
        </div>
        @endforeach
    </div>

    <!-- 👇 Hidden input to collect updated image order -->
    <input type="hidden" name="image_order" id="image_order">

    <!-- 👇 Hidden input to collect deleted images -->
    <input type="hidden" name="deleted_images" id="deleted_images">
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    const deletedImages = [];

    document.addEventListener('DOMContentLoaded', function () {
        // 🧩 Enable drag-and-drop
        new Sortable(document.getElementById('sortable-images'), {
            animation: 150,
            ghostClass: 'sortable-ghost',
            dragClass: 'sortable-drag',
        });

        // 🗑 Handle delete
        document.querySelectorAll('.delete-image').forEach(btn => {
            btn.addEventListener('click', function () {
                const image = this.dataset.image;
                deletedImages.push(image);
                this.closest('.sortable-image').remove();
                document.getElementById('deleted_images').value = JSON.stringify(deletedImages);
            });
        });

        // 📝 Save order on submit
        const form = document.querySelector('form');
        form.addEventListener('submit', function () {
            const ordered = Array.from(document.querySelectorAll('.sortable-image')).map(div => div.dataset.image);
            document.getElementById('image_order').value = JSON.stringify(ordered);
        });
    });
</script>
