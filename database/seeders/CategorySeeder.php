<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'Olah Raga',
            'slug' => 'olah-raga',
            'color' => 'green'
        ]);
        Category::create([
            'name' => 'Kesehatan Mental',
            'slug' => 'kesehatan-mental',
            'color' => 'blue'
        ]);
    }
}
