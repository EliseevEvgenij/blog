<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)   
    {
        try{
        $data = $request->validated();         // получаем тайтл из реквеста в дату
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        //dd($data);
        $post = Post::create($data);  // tag::firstOrCreate([$data['title']]); // проверка на уникальность чтобы не создавались одинаковые категории (если в базе данных неуказали уникальность тайтла)  
        
        $post->tags()->attach($tagIds);
        return redirect()->route('admin.post.index') ; // вернёт на главную по категориям 
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}