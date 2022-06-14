<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class imageRequest extends FormRequest
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
            'project_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png|required',

        ];
    }
    public function messages()
    {
        return [
            'project_id.required' => 'Lütfen projeyi seçin',
            'image.mimes' => 'Sadece .jpeg, .jpg, .png uzantılı dosyalar ekleyebilirsiniz.',
            'image.required' => 'Lütfen projeye resim dosyası ekleyin.',

        ];
    }
}
