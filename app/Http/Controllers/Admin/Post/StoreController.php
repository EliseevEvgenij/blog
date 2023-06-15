<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)   
    {
        $data = $request->validated();      // обрабатываем запрос       
        $this->service->store($data);       // взаимодействие с базой

        return redirect()->route('admin.post.index') ; // вернёт на главную ответ
        
    }
}