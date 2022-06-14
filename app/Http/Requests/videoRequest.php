<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class videoRequest extends FormRequest
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
            'video' => 'mimes:mp4,mov,ogg|max:100000|required',

        ];
    }
    public function messages()
    {
        return [
            'project_id.required' => 'Lütfen projeyi seçin.',
            'video.mimes' => 'Sadece mp4,mov,ogg uzantılı dosyalar ekleyebilirsiniz.',
            'video.required' => 'Lütfen projeye video dosyası ekleyin.',
            'video.max' => '100 MB tan daha büyük dosya ekleyemessiniz.',


        ];
    }
}
