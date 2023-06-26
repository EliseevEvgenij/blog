<?php

namespace App\Http\Requests\Admin\Post;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  // незабывать обезательно изменить фолс на тру 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array //рулс это -правило что нужно именно из реквеста забрать
    {
        return [
            'title' => 'required|string|unique:posts,title',
            'content' => 'required|string|unique:posts,content',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id', // проверка на существование в таблице catigories
            'tag_ids' => 'nullable|array', 
            'tag_ids.*' => 'nullable|integer|exists:tags,id',  // .* означает что всё что находится внутри nag_ids . Во второй строке - проверка каждого отдельного элемента массива
        ];
    }
}