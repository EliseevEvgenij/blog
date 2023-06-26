<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)  // так как в роуте (Route::get('/{category}')
    {
        //dd($request);
        $data = $request -> validate(array('title'=>'required'));    // обнавляем категорию
        $user -> update($data);
        return view('admin.user.show', compact('user')); //путь майн/индексблэйд
    }

}
