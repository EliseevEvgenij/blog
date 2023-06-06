<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags'; // наименование таблицы
    protected $quarded = false; // это правило чтобы мог изменять данные в таблице(чтобы небыло ошибок)

}
