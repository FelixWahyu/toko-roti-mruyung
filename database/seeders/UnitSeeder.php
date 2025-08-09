<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = ['Paket', 'Pcs', 'Loyang', 'Box'];
        foreach ($units as $unit) {
            Unit::create([
                'name' => $unit,
                'slug' => Str::slug($unit),
            ]);
        }
    }
}
