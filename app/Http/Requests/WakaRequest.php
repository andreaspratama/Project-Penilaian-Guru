<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WakaRequest extends FormRequest
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
            'penamKepri' => 'required|max:2',
            'sikerKepri' => 'required|max:2',
            'maskerKepri' => 'required|max:2',
            'kesetiaanpimKepri' => 'required|max:2',
            'valuePeda' => 'required|max:2',
            'manajkelasPeda' => 'required|max:2',
            'lmsPeda' => 'required|max:2',
            'modelpemPeda' => 'required|max:2',
            'mediaPeda' => 'required|max:2',
            'kualitaspemPeda' => 'required|max:2',
            'samapendSos' => 'required|max:2',
            'organisasiSos' => 'required|max:2',
            'kompkeilmuProfesional' => 'required|max:2',
            'kompdigProfesional' => 'required|max:2',
            'seminarProfesional' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'penamKepri.required' => 'Penampilan tidak boleh kosong',
            'penamKepri.max' => 'Penampilan nilai max 2 angka',

            'sikerKepri.required' => 'Sikap kerja tidak boleh kosong',
            'sikerKepri.max' => 'Sikap kerja nilai max 2 angka',

            'maskerKepri.required' => 'Masuk kerja tidak boleh kosong',
            'maskerKepri.max' => 'Masuk kerja nilai max 2 angka',

            'kesetiaanpimKepri.required' => 'Kesetiaan pada Pimpinan tidak boleh kosong',
            'kesetiaanpimKepri.max' => 'Kesetiaan pada Pimpinan nilai max 2 angka',

            'valuePeda.required' => 'Value SPECIAL tidak boleh kosong',
            'valuePeda.max' => 'Value SPECIAL nilai max 2 angka',

            'manajkelasPeda.required' => 'Manajemen kelas tidak boleh kosong',
            'manajkelasPeda.max' => 'Manajemen kelas nilai max 2 angka',

            'lmsPeda.required' => 'Penggunaan LMS tidak boleh kosong',
            'lmsPeda.max' => 'Penggunaan LMS nilai max 2 angka',

            'modelpemPeda.required' => 'Model pembelajaran tidak boleh kosong',
            'modelpemPeda.max' => 'Model pembelajaran nilai max 2 angka',

            'mediaPeda.required' => 'Media Pembelajaran tidak boleh kosong',
            'mediaPeda.max' => 'Media Pembelajaran nilai max 2 angka',

            'kualitaspemPeda.required' => 'Kualitas Pembelajaran tidak boleh kosong',
            'kualitaspemPeda.max' => 'Kualitas Pembelajaran nilai max 2 angka',

            'samapendSos.required' => 'Kerjasama dengan Pendidik tidak boleh kosong',
            'samapendSos.max' => 'Kerjasama dengan Pendidik nilai max 2 angka',

            'organisasiSos.required' => 'Organisasi/ Kegiatan Sekolah tidak boleh kosong',
            'organisasiSos.max' => 'Organisasi/ Kegiatan Sekolah nilai max 2 angka',

            'kompkeilmuProfesional.required' => 'Kompetensi Keilmuan tidak boleh kosong',
            'kompkeilmuProfesional.max' => 'Kompetensi Keilmuan nilai max 2 angka',

            'kompdigProfesional.required' => 'Kompetensi Digital tidak boleh kosong',
            'kompdigProfesional.max' => 'Kompetensi Digital nilai max 2 angka',
            
            'seminarProfesional.required' => 'Seminar / Literasi tidak boleh kosong',
            'seminarProfesional.max' => 'Seminar / Literasi nilai max 2 angka',
        ];
    }
}
