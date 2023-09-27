<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'menu_name',
        'menu_description',
        'menu_picture',
        'menu_price',
        'menu_status'
    ];


}
