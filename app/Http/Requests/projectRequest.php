<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projectRequest extends FormRequest
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
            'title' => 'required|max:40',
            'location' => 'required|max:40',
            'started-date' => 'required',
            'finished-date' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png|required',

        ];
    }
        public function messages()
        {
            return [
                'title.required' => 'Lütfen proje başlığı girin.',
                'title.max' => 'Proje başlığı 40 karakterden fazla olamaz',
                'location.required' => 'Lütfen projenin yeri kısmını girin.',
                'location.max' => 'Proje yeri 40 karakterden fazla olamaz',
                'started-date.required' => 'Lütfen projenin başlangıç tarihini seçin',
                'finished-date.required' => 'Lütfen projenin bitiş tarihini seçin',
                'description.required' => 'Lütfen projenin açıklama kısmını doldurun.',
                'image.mimes' => 'Sadece .jpeg, .jpg, .png uzantılı dosyalar ekleyebilirsiniz.',
                'image.required' => 'Lütfen projeye resim dosyası ekleyin.',

            ];
        }
}
