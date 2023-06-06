<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest as PostStoreRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(PostStoreRequest $request)   
    {
        $data = $request->validated();         // получаем тайтл из реквеста в дату
        Post::create($data);  // tag::firstOrCreate([$data['title']]); // проверка на уникальность чтобы не создавались одинаковые категории (если в базе данных неуказали уникальность тайтла)  
        return redirect()->route('admin.post.index') ; // вернёт на главную по категориям 
    }

}





