<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();          //получаем список tags 

        return view('admin.tag.index',     //путь майн/индексблэйд    это блэйд
        compact('tags'));   // передаём список tags 
    }

}
