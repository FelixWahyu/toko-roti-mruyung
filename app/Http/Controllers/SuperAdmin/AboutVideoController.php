<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\AboutVideo;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class AboutVideoController extends Controller
{
    public function index()
    {
        $videos = AboutVideo::orderBy('order', 'asc')->latest()->paginate(10);
        return view('superadmin.about-videos.video-page', compact('videos'));
    }

    public function create()
    {
        return view('superadmin.about-videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/quicktime,video/webm,video/x-matroska,video/ogg|max:102400',
            'video_url' => 'nullable|string|max:1000',
            'order' => 'nullable|integer|min:0',
        ]);

        if (!$request->hasFile('video_file') && empty($request->video_url)) {
            return back()->withInput()->withErrors([
                'video_file' => 'Silakan pilih file video untuk diunggah ke Cloudinary atau masukkan URL video.',
            ]);
        }

        $videoUrl = $request->video_url;
        $cloudinaryPublicId = null;

        if ($request->hasFile('video_file')) {
            try {
                $uploaded = Cloudinary::uploadApi()->upload(
                    $request->file('video_file')->getRealPath(),
                    [
                        'resource_type' => 'video',
                        'folder' => 'about-videos',
                    ]
                );

                $videoUrl = $uploaded['secure_url'] ?? $uploaded['url'] ?? null;
                $cloudinaryPublicId = $uploaded['public_id'] ?? null;

                if (!$videoUrl) {
                    throw new \Exception('URL video tidak ditemukan dari respon Cloudinary.');
                }
            } catch (\Throwable $e) {
                return back()->withInput()->with('error', 'Gagal mengunggah video ke Cloudinary: ' . $e->getMessage());
            }
        }

        AboutVideo::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $videoUrl,
            'cloudinary_public_id' => $cloudinaryPublicId,
            'is_active' => $request->boolean('is_active', true),
            'order' => $request->filled('order') ? (int) $request->order : 0,
        ]);

        return redirect()->route('admin.about-videos.index')->with('success', 'Video profil berhasil ditambahkan.');
    }

    public function edit(AboutVideo $aboutVideo)
    {
        return view('superadmin.about-videos.edit', compact('aboutVideo'));
    }

    public function update(Request $request, AboutVideo $aboutVideo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/quicktime,video/webm,video/x-matroska,video/ogg|max:102400',
            'video_url' => 'nullable|string|max:1000',
            'order' => 'nullable|integer|min:0',
        ]);

        $videoUrl = $request->video_url ?: $aboutVideo->video_url;
        $cloudinaryPublicId = $aboutVideo->cloudinary_public_id;

        if ($request->hasFile('video_file')) {
            try {
                $uploaded = Cloudinary::uploadApi()->upload(
                    $request->file('video_file')->getRealPath(),
                    [
                        'resource_type' => 'video',
                        'folder' => 'about-videos',
                    ]
                );

                if ($aboutVideo->cloudinary_public_id) {
                    try {
                        Cloudinary::uploadApi()->destroy($aboutVideo->cloudinary_public_id, [
                            'resource_type' => 'video',
                        ]);
                    } catch (\Throwable $ignored) {
                    }
                }

                $videoUrl = $uploaded['secure_url'] ?? $uploaded['url'] ?? $videoUrl;
                $cloudinaryPublicId = $uploaded['public_id'] ?? null;
            } catch (\Throwable $e) {
                return back()->withInput()->with('error', 'Gagal mengunggah video ke Cloudinary: ' . $e->getMessage());
            }
        }

        $aboutVideo->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $videoUrl,
            'cloudinary_public_id' => $cloudinaryPublicId,
            'is_active' => $request->boolean('is_active', false),
            'order' => $request->filled('order') ? (int) $request->order : 0,
        ]);

        return redirect()->route('admin.about-videos.index')->with('success', 'Video profil berhasil diperbarui.');
    }

    public function destroy(AboutVideo $aboutVideo)
    {
        if ($aboutVideo->cloudinary_public_id) {
            try {
                Cloudinary::uploadApi()->destroy($aboutVideo->cloudinary_public_id, [
                    'resource_type' => 'video',
                ]);
            } catch (\Throwable $ignored) {
            }
        }

        $aboutVideo->delete();
        return back()->with('success', 'Video profil berhasil dihapus.');
    }
}
