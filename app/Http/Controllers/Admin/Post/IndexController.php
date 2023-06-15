<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $post = Post::all();          //получаем список postov 

        return view('admin.post.index',     //путь майн/индексблэйд    это блэйд
        ['posts'=>$post]);   // передаём список postov 
    }

}
