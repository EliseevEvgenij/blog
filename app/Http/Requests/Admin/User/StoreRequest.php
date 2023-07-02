<?php

namespace App\Http\Requests\Admin\User;

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
    {                              // валидируем правила . можно посмотреть правила по умолчанию в Auth/registercontroller     
        return [  
            'name' => 'required|string|',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|',
            'password' => 'required|min:6|confirmed', // повторная проверка пороля
            'role' => 'required|integer'
             
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
            'email.unique' => 'Пользователь с таким email существует',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Пароль должно быть строкой '
        ];
    }
}
