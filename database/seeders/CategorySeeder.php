<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_title' => "Makanan Pembuka",
            'category_description' => "Deskripsi Makanan Pembuka",
            'category_picture' => "path",
            'category_status' => true,
        ]);

        Category::create([
            'category_title' => "Makanan Penutup",
            'category_description' => "Deskripsi Makanan Penutup",
            'category_picture' => "path",
            'category_status' => true,
        ]);

    }
}
