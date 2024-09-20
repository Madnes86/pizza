<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь на выполнение данного запроса.
     *
     * @return bool
     */
    public function authorize()
    {
        // Здесь можно добавить логику авторизации, если необходимо
        return true;
    }

    /**
     * Получить правила валидации для запроса.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Здесь можно добавить правила валидации, если есть поля для проверки
            // В данном случае нет дополнительных данных для проверки, поэтому массив пустой
        ];
    }
    
    /**
     * Сообщения об ошибках валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // Здесь можно добавить пользовательские сообщения об ошибках, если они нужны
        ];
    }
}
