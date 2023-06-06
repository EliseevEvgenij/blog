<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(Category $category)  // так как в роуте (Route::get('/{category}')
    {
        return view('admin.category.edit', compact('category')); //путь майн/индексблэйд
    }

}
