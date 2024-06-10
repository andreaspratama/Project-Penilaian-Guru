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
            'valuePeda' => 'required|max:2',
            'manajPeda' => 'required|max:2',
            'lmsPeda' => 'required|max:2',
            'modelPeda' => 'required|max:2',
            'mediaPeda' => 'required|max:2',
            'kerjasoSos' => 'required|max:2',
            'kompdigProfesional' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'valuePeda.required' => 'Value SPECIAL tidak boleh kosong',
            'valuePeda.max' => 'Value SPECIAL nilai max 2 angka',

            'manajPeda.required' => 'Manajemen kelas tidak boleh kosong',
            'manajPeda.max' => 'Manajemen kelas nilai max 2 angka',

            'lmsPeda.required' => 'Penggunaan LMS tidak boleh kosong',
            'lmsPeda.max' => 'Penggunaan LMS nilai max 2 angka',

            'modelPeda.required' => 'Model pembelajaran tidak boleh kosong',
            'modelPeda.max' => 'Model pembelajaran nilai max 2 angka',

            'mediaPeda.required' => 'Media Pembelajaran tidak boleh kosong',
            'mediaPeda.max' => 'Media Pembelajaran nilai max 2 angka',

            'kerjasoSos.required' => 'Kerjasama dengan Siswa/ Orang Tua tidak boleh kosong',
            'kerjasoSos.max' => 'Kerjasama dengan Siswa/ Orang Tua nilai max 2 angka',

            'kompdigProfesional.required' => 'Kompetensi Digital tidak boleh kosong',
            'kompdigProfesional.max' => 'Kompetensi Digital nilai max 2 angka',
        ];
    }
}
