<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mailRequest extends FormRequest
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
            'name' => 'required|max:40',
            'surname' => 'required|max:40',
            'email' => 'required',
            'message' => 'required|max:400',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Lütfen isim bölümünü girin.',
            'name.max' => 'İsim bölümü 40 karakterden fazla olamaz',
            'surname.required' => 'Lütfen soyisim bölümünü girin.',
            'surname.max' => 'Soyisim bölümü 40 karakterden fazla olamaz',
            'email.required' => 'Lütfen email bölümünü girin.',
            'message.required' => 'Lütfen message bölümünü girin.',
            'message.max' => 'Mesaj bölümü 400 karakterden fazla olamaz',



        ];
    }
}
