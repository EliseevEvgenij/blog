<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)   
    {
        $data = $request->validated();         // получаем тайтл из реквеста в дату
        Category::create($data);  // Category::firstOrCreate([$data['title']]); // проверка на уникальность чтобы не создавались одинаковые категории (если в базе данных неуказали уникальность тайтла)  
        return redirect()->route('admin.category.index') ; // вернёт на главную по категориям 
    }

}





