<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)   
    {
        $data = $request->validated(); 
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']], $data);  // Category::firstOrCreate([$data['title']]); // проверка на уникальность чтобы не создавались одинаковые категории (если в базе данных неуказали уникальность тайтла)  
        return redirect()->route('admin.user.index') ; // вернёт на главную по категориям 
    }

}





