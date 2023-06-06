<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)  // так как в роуте (Route::get('/{tag}')
    {
        //dd($request);
        $data = $request -> validate(array('title'=>'required'));    // обнавляем категорию
        $tag -> update($data);
        return view('admin.tag.show', compact('tag')); //путь майн/индексблэйд
    }

}
