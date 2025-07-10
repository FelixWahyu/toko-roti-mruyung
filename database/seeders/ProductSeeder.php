<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1, // Roti Tawar
            'unit_id' => 1, // Bungkus
            'name' => 'Roti Tawar Klasik',
            'slug' => 'roti-tawar-klasik',
            'description' => 'Roti tawar lembut dengan tekstur klasik, cocok untuk sarapan.',
            'price' => 15000,
            'stock' => 50,
            'image' => 'https://images.unsplash.com/photo-1549932272-72b94e556208?q=80&w=1964&auto=format&fit=crop'
        ]);

        Product::create([
            'category_id' => 2, // Roti Manis
            'unit_id' => 2, // Pcs
            'name' => 'Roti Coklat Keju',
            'slug' => 'roti-coklat-keju',
            'description' => 'Perpaduan sempurna antara coklat manis dan keju gurih.',
            'price' => 7000,
            'stock' => 100,
            'image' => 'https://images.unsplash.com/photo-1621832623599-341dee5b315a?q=80&w=2070&auto=format&fit=crop'
        ]);

        Product::create([
            'category_id' => 3, // Kue Kering
            'unit_id' => 4, // Box
            'name' => 'Nastar Premium',
            'slug' => 'nastar-premium',
            'description' => 'Kue nastar dengan isian selai nanas asli dan mentega wisman.',
            'price' => 85000,
            'stock' => 30,
            'image' => 'https://images.unsplash.com/photo-1594222303348-a96a363a83a7?q=80&w=1935&auto=format&fit=crop'
        ]);
    }
}
