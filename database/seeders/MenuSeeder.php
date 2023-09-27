<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'category_id' => 1,
            'menu_name' => "Pecel",
            'menu_description' => "Deskripsi Makanan Pembuka",
            'menu_picture' => "pecel.jpeg",
            'menu_prize' => 120000,
            'menu_status' => true
        ]);

        Menu::create([
            'category_id' => 1,
            'menu_name' => "Gado Gado",
            'menu_description' => "Deskripsi Makanan Pembuka",
            'menu_picture' => "gado.jpeg",
            'menu_prize' => 20000,
            'menu_status' => false
        ]);

        Menu::create([
            'category_id' => 1,
            'menu_name' => "Soto",
            'menu_description' => "Deskripsi Makanan Pembuka",
            'menu_picture' => "soto.jpeg",
            'menu_prize' => 15000,
            'menu_status' => false
        ]);

        Menu::create([
            'category_id' => 1,
            'menu_name' => "Rawon",
            'menu_description' => "Deskripsi Makanan Pembuka",
            'menu_picture' => "rawon.jpeg",
            'menu_prize' => 17000,
            'menu_status' => true
        ]);

        Menu::create([
            'category_id' => 2,
            'menu_name' => "Es Campur",
            'menu_description' => "Deskripsi Makanan Pembuka",
            'menu_picture' => "campur.jpeg",
            'menu_prize' => 17000,
            'menu_status' => true
        ]);

        Menu::create([
            'category_id' => 2,
            'menu_name' => "Es Pisang Ijo",
            'menu_description' => "Deskripsi Makanan Pembuka",
            'menu_picture' => "pisang.jpeg",
            'menu_prize' => 17000,
            'menu_status' => true
        ]);
    }
}
