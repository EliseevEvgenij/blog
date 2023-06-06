<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();          //получаем список категорий 

        return view('admin.category.index',     //путь майн/индексблэйд    это блэйд
        compact('categories'));   // передаём список категорий 
    }

}
