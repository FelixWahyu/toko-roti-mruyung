<?php

namespace Database\Seeders;

use App\Models\AboutVideo;
use Illuminate\Database\Seeder;

class AboutVideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            [
                'title' => 'Kehangatan Toko & Suasana Klasik',
                'description' => 'Melihat lebih dekat kenyamanan ruang kafe, bakery, dan atmosfer bernuansa klasik khas Kota Lama Banyumas.',
                'video_url' => 'https://res.cloudinary.com/j9s1puj0/video/upload/v1787382308/review-video-2025.mp4',
                'cloudinary_public_id' => 'review-video-2025',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Kreasi Spesial Kue Nanas Mruyung',
                'description' => 'Intip ketelitian dan keahlian baker kami dalam mengolah bahan pilihan hingga menjadi sajian favorit keluarga.',
                'video_url' => 'https://res.cloudinary.com/j9s1puj0/video/upload/v1787382242/video-kue-nanas-2026-08-21.mp4',
                'cloudinary_public_id' => 'video-kue-nanas-2026-08-21',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($videos as $video) {
            AboutVideo::firstOrCreate(
                ['title' => $video['title']],
                $video
            );
        }
    }
}
