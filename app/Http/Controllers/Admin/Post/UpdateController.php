<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)  // так как в роуте (Route::get('/{tag}')
    {
        //dd($request);
        //$data = $request -> validate(array('title'=>'required'));    // обнавляем категорию
        //$post -> update($data);
        //return view('admin.post.show', compact('post')); //путь майн/индексблэйд
    
        //dd($request);
        $data = $request -> validated();    // обнавляем категорию
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        //dd($post);
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $post -> update($data);
        $post ->tags()->sync($tagIds); // sync добавляет только те которые указали
        return view('admin.post.show', compact('post')); //путь майн/индексблэйд
    
    }

}
