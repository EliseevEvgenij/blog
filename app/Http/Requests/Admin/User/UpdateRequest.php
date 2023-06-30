<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class UpdateRequest extends FormRequest
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
        return [  // здесь указываем то что можно будет поменять(обновить)
            'name' => 'required|string|',
            'email' => 'required|string|email|unique:users,email,'.$this->user->id,  //проверяет на уникальность email'а, исключая из проверки пользователя по своему id.
            'password' => 'required|string|',
            'password' => 'required|min:6|confirmed', // повторная проверка пороля
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Почта должно быть строкой',
            'email.email' => 'Ваша почта должна соответствовать формату example@mail.ru',
            'email.unique' => 'Пользователь с таким email существует'
            
        ];
    }
}
