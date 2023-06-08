<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; // трейт на безопасное удаление модели

    protected $table = 'posts'; // наименование таблицы
    protected $quarded = false; // это правило чтобы мог изменять данные в таблице(чтобы небыло ошибок)
    protected $fillable = ['title','content'];  // чтобы записать в бд тайтл
}
