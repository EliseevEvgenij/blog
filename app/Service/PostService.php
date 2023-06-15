<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService 
{
    public function store($data)
    {
        try{
            DB::beginTransaction(); // begin - это точка, куда потом нужно откатить в случае чего.
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
    
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            //dd($data);
            $post = Post::create($data);  // tag::firstOrCreate([$data['title']]); // проверка на уникальность чтобы не создавались одинаковые категории (если в базе данных неуказали уникальность тайтла)  
            
            $post->tags()->attach($tagIds); 
            DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                abort(500);
            } 
    }
    public function update($data, $post)
    {
        try{
            DB::beginTransaction();   //begin - это точка, куда потом нужно откатить в случае чего.
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            //dd($post);
            if(isset( $data['preview_image'])) {        //isset проверка на то что если есть картинка внутри
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if(isset( $data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post -> update($data);
            $post ->tags()->sync($tagIds); // sync добавляет только те которые указали
            DB::commit();
            return $post;
        } catch (Exception $exception){
                DB::rollBack();
                abort(500);
            }
        return $post;
    }
}