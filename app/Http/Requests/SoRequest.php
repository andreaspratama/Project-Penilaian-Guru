<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'valuePeda' => 'required|numeric|max:10|min:6',
            'manajPeda' => 'required|numeric|max:10|min:6',
            'lmsPeda' => 'required|numeric|max:10|min:6',
            'modelPeda' => 'required|numeric|max:10|min:6',
            'mediaPeda' => 'required|numeric|max:10|min:6',
            'kerjasoSos' => 'required|numeric|max:10|min:6',
            'kompdigProfesional' => 'required|numeric|max:10|min:6',
        ];
    }

    public function messages()
    {
        return [
            'valuePeda.required' => 'Upss, nilai harus diisi yaa...',
            'valuePeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'valuePeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'manajPeda.required' => 'Upss, nilai harus diisi yaa...',
            'manajPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'manajPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'lmsPeda.required' => 'Upss, nilai harus diisi yaa...',
            'lmsPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'lmsPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'modelPeda.required' => 'Upss, nilai harus diisi yaa...',
            'modelPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'modelPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'mediaPeda.required' => 'Upss, nilai harus diisi yaa...',
            'mediaPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'mediaPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kerjasoSos.required' => 'Upss, nilai harus diisi yaa...',
            'kerjasoSos.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kerjasoSos.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kompdigProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompdigProfesional.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kompdigProfesional.min' => 'Upss, sorry nilai minimal harus 6 yaa...',
        ];
    }
}
