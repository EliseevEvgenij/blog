<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class DeleteController extends Controller
{
    public function __invoke(Category $category)  // так как в роуте (Route::get('/{category}')
    {
        
        $category->delete();
        return redirect()->route('admin.category.index'); //путь майн/индексблэйд
    }

}
