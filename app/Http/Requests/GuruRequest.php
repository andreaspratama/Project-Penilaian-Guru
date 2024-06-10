<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            'kepedulianKepri' => 'required|max:2',
            'persekutuanKepri' => 'required|max:2',
            'kesetiaanyskiKepri' => 'required|max:2',
            'kesetiaanpimKepri' => 'required|max:2',
            'modelPeda' => 'required|max:2',
            'samaortuSos' => 'required|max:2',
            'kompkeilmuProfesional' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'kepedulianKepri.required' => 'Kepedulian tidak boleh kosong',
            'kepedulianKepri.max' => 'Kepedulian nilai max 2 angka',

            'persekutuanKepri.required' => 'Persekutuan Doa/ Ibadah tidak boleh kosong',
            'persekutuanKepri.max' => 'Persekutuan Doa/ Ibadah nilai max 2 angka',

            'kesetiaanyskiKepri.required' => 'Kesetiaan pada YSKI tidak boleh kosong',
            'kesetiaanyskiKepri.max' => 'Kesetiaan pada YSKI nilai max 2 angka',

            'kesetiaanpimKepri.required' => 'Kesetiaan pada Pimpinan tidak boleh kosong',
            'kesetiaanpimKepri.max' => 'Kesetiaan pada Pimpinan nilai max 2 angka',

            'modelPeda.required' => 'Model pembelajaran tidak boleh kosong',
            'modelPeda.max' => 'Model pembelajaran nilai max 2 angka',

            'samaortuSos.required' => 'Kerjasama dengan Siswa/ Orang Tua tidak boleh kosong',
            'samaortuSos.max' => 'Kerjasama dengan Siswa/ Orang Tua nilai max 2 angka',

            'kompkeilmuProfesional.required' => 'Kompetensi Keilmuan tidak boleh kosong',
            'kompkeilmuProfesional.max' => 'Kompetensi Keilmuan nilai max 2 angka',
        ];
    }
}
