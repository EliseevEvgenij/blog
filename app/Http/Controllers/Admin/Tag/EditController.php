<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Tag $tag)  // так как в роуте (Route::get('/{tag}')
    {
        return view('admin.tag.edit', compact('tag')); //путь майн/индексблэйд
    }

}
