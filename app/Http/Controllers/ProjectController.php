<?php
/*
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Image\Image;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        return view('portfolio.show', compact('project'));
    }

    public function home()
    {
        $projects = Project::all();

        return view('index', compact('projects'));
    }

    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'category_filter' => 'nullable|string',
            'client' => 'nullable|string',
            'project_date' => 'nullable|date',
            'project_url' => 'nullable|url',
            'thumbnail' => 'nullable|image',
            'images.*' => 'nullable|image',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $originalThumbnail = $request->file('thumbnail');
            $uuid = Str::uuid()->toString();
            $ext = $originalThumbnail->getClientOriginalExtension();
            $filename = $uuid.'.'.$ext;

            $originalPath = "projects/covers/{$filename}";
            $originalThumbnail->storeAs('public', $originalPath);
            $validatedData['thumbnail'] = $originalPath;

            // Convert to WebP and AVIF
            $originalFullPath = storage_path("app/public/{$originalPath}");

            Image::load($originalFullPath)
                ->quality(75)
                ->save(storage_path("app/public/projects/covers/{$uuid}.webp"));

            Image::load($originalFullPath)
                ->quality(80)
                ->save(storage_path("app/public/projects/covers/{$uuid}.avif"));
        }

        // Handle gallery images upload
        $galleryImagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uuid = Str::uuid()->toString();
                $ext = $image->getClientOriginalExtension();
                $filename = "{$uuid}.{$ext}";

                $originalPath = "projects/gallery/{$filename}";
                $image->storeAs('public', $originalPath);
                $galleryImagePaths[] = $originalPath;

                $originalFullPath = storage_path("app/public/{$originalPath}");

                Image::load($originalFullPath)
                    ->quality(75)
                    ->save(storage_path("app/public/projects/gallery/{$uuid}.webp"));

                Image::load($originalFullPath)
                    ->quality(80)
                    ->save(storage_path("app/public/projects/gallery/{$uuid}.avif"));
            }
        } elseif ($request->filled('image_order')) {
            // No new images uploaded — use reordered list
            $orderedImages = json_decode($request->input('image_order'), true);
            $galleryImagePaths = $orderedImages;
        }

        // Save project
        $project = new Project($validatedData);
        $project->images = json_encode($galleryImagePaths);
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'category_filter' => 'nullable|string',
            'client' => 'nullable|string',
            'project_date' => 'nullable|date',
            'project_url' => 'nullable|url',
            'thumbnail' => 'nullable|image',
            'images.*' => 'nullable|image',
        ]);

        // Handle thumbnail update
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $uuid = Str::uuid()->toString();
            $ext = $thumbnail->getClientOriginalExtension();
            $filename = "{$uuid}.{$ext}";
            $path = $thumbnail->storeAs('projects/covers', $filename, 'public');
            $validated['thumbnail'] = $path;

            $fullPath = storage_path("app/public/{$path}");

            Image::load($fullPath)
                ->quality(75)
                ->save(storage_path("app/public/projects/covers/{$uuid}.webp"));

            Image::load($fullPath)
                ->quality(80)
                ->save(storage_path("app/public/projects/covers/{$uuid}.avif"));
        }

        // Handle gallery images
        $galleryImagePaths = json_decode($project->images ?? '[]', true);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uuid = Str::uuid()->toString();
                $ext = $image->getClientOriginalExtension();
                $filename = "{$uuid}.{$ext}";

                $path = $image->storeAs('projects/gallery', $filename, 'public');
                $galleryImagePaths[] = "projects/gallery/{$filename}";

                $fullPath = storage_path("app/public/projects/gallery/{$filename}");

                Image::load($fullPath)
                    ->quality(75)
                    ->save(storage_path("app/public/projects/gallery/{$uuid}.webp"));

                Image::load($fullPath)
                    ->quality(80)
                    ->save(storage_path("app/public/projects/gallery/{$uuid}.avif"));
            }
        }

        // If image_order is provided and no new images were uploaded, reorder images
        if (!$request->hasFile('images') && $request->filled('image_order')) {
            $orderedImages = json_decode($request->input('image_order'), true);
            $galleryImagePaths = $orderedImages;
        }
        // Handle deleted images
        $deletedImages = json_decode($request->input('deleted_images', '[]'), true);
        if (!empty($deletedImages)) {
            foreach ($deletedImages as $deletedImage) {
                // Remove from array
                $galleryImagePaths = array_filter($galleryImagePaths, fn ($path) => $path !== $deletedImage);

                // Delete files (original + webp + avif)
                Storage::disk('public')->delete($deletedImage);

                $webp = preg_replace('/\.[^.]+$/', '.webp', $deletedImage);
                $avif = preg_replace('/\.[^.]+$/', '.avif', $deletedImage);
                Storage::disk('public')->delete([$webp, $avif]);
            }

            // Re-index array
            $galleryImagePaths = array_values($galleryImagePaths);
        }

        $project->fill($validated);
        $project->images = json_encode($galleryImagePaths);
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    // New method to convert all existing images to webp and avif
    public function convertAllImagesToWebpAvif()
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            // Convert thumbnail
            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                $originalPath = storage_path('app/public/'.$project->thumbnail);
                $uuid = pathinfo($project->thumbnail, PATHINFO_FILENAME);

                Image::load($originalPath)
                    ->quality(75)
                    ->save(storage_path("app/public/projects/covers/{$uuid}.webp"));

                Image::load($originalPath)
                    ->quality(80)
                    ->save(storage_path("app/public/projects/covers/{$uuid}.avif"));
            }

            // Convert gallery images
            $galleryImages = json_decode($project->images ?? '[]', true);

            foreach ($galleryImages as $imagePath) {
                if (Storage::disk('public')->exists($imagePath)) {
                    $originalPath = storage_path('app/public/'.$imagePath);
                    $uuid = pathinfo($imagePath, PATHINFO_FILENAME);

                    Image::load($originalPath)
                        ->quality(75)
                        ->save(storage_path("app/public/projects/gallery/{$uuid}.webp"));

                    Image::load($originalPath)
                        ->quality(80)
                        ->save(storage_path("app/public/projects/gallery/{$uuid}.avif"));
                }
            }
        }

        // Convert images inside portfolio folder
        $portfolioFiles = Storage::disk('public')->files('portfolio');
        foreach ($portfolioFiles as $file) {
            $originalPath = storage_path('app/public/'.$file);
            $uuid = pathinfo($file, PATHINFO_FILENAME);

            Image::load($originalPath)
                ->quality(85)
                ->save(storage_path("app/public/portfolio/{$uuid}.webp"));

            Image::load($originalPath)
                ->quality(85)
                ->save(storage_path("app/public/portfolio/{$uuid}.avif"));
        }

        return 'All images in projects and portfolio converted to WebP and AVIF!';
    }
}
*/
