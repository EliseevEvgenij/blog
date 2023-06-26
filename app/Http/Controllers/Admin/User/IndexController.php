<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = User::all();          //получаем список категорий 
        
        //return view('admin.user.index',     //путь майн/индексблэйд    это блэйд
        //compact('users'));   // передаём список user 
         return view('admin.user.index',     //путь майн/индексблэйд    это блэйд
         ['users'=>$user]);   // передаём список postov 
    }

}
