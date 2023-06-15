<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)  // так как в роуте (Route::get('/{tag}')
    {
        //dd($request);
        //$data = $request -> validate(array('title'=>'required'));    // обнавляем категорию
        //$post -> update($data);
        //return view('admin.post.show', compact('post')); //путь майн/индексблэйд
    
        //dd($request);
        
        $data = $request -> validated();    // обрабатываем запрос 
        $post = $this->service->update($data, $post); // взаимодействие с базой.обновлённый post

        
        return view('admin.post.show', compact('post')); // передаём ответ
    
    }

}
