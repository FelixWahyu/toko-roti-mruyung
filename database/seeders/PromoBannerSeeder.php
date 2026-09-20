<?php

namespace Database\Seeders;

use App\Models\PromoBanner;
use Illuminate\Database\Seeder;

class PromoBannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Promo Layanan Kamar',
                'image' => 'images/promo/promo-layanan.jpeg',
                'link' => '#',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Promo Diskon Lebaran',
                'image' => 'images/promo/promo1.jpg',
                'link' => '#',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Promo Gratis Ongkir',
                'image' => 'images/promo/promo2.jpg',
                'link' => '#',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Promo Beli 1 Gratis 1',
                'image' => 'images/promo/promo3.jpg',
                'link' => '#',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Promo Potongan Harga',
                'image' => 'images/promo/promo4.jpg',
                'link' => '#',
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($banners as $banner) {
            PromoBanner::firstOrCreate(
                ['title' => $banner['title']],
                $banner
            );
        }
    }
}
