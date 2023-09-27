<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

class MenuController extends Controller
{

    public function getAllMenu()
    {

        $makanans = Menu::where('category_id', 1)->get();
        $minumas = Menu::where('category_id', 2)->get();


        $kategori = Category::all();

        return view('menu', 
        [
            'makanans' => $makanans, 
            'minumans' => $minumas,
            'kategoris'=> $kategori

        ]);  
    }

}
