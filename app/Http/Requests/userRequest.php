<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'email' => 'required|max:40',
            'password' => 'required|max:25',
            'password_confirmation' => 'required|max:25',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Lütfen bir kullanıcı adı giriniz',
            'email.required' => 'Lütfen bir email adresi giriniz.',
            'password.required' => 'Lütfen bir şifre giriniz.',
            'password_confirmation.required' => 'Lütfen şifre onayı giriniz.',
            'name.max' => 'Bu alan 30 karakterden daha fazla olamaz.',
            'email.max' => 'Bu alan 40 karakterden daha fazla olamaz.',
            'password.max' => 'Bu alan 25 karakterden daha fazla olamaz.',
            'password_confirmation.max' => 'Bu alan 25 karakterden daha fazla olamaz.',


        ];
    }
}
