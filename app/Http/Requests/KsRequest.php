<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KsRequest extends FormRequest
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
            'prilakuKepri' => 'required|max:2',
            'tuturkataKepri' => 'required|max:2',
            'keuanganKepri' => 'required|max:2',
            'kepedulianKepri' => 'required|max:2',
            'persekutuanKepri' => 'required|max:2',
            'penampilanKepri' => 'required|max:2',
            'sikapkerjaKepri' => 'required|max:2',
            'masukkerjaKepri' => 'required|max:2',
            'kesetianyskiKepri' => 'required|max:2',
            'kesetianpimKepri' => 'required|max:2',
            'manajkelasPeda' => 'required|max:2',
            'kualitaspemPeda' => 'required|max:2',
            'samaortuSos' => 'required|max:2',
            'samapendSos' => 'required|max:2',
            'samatenpendSos' => 'required|max:2',
            'organisasiSos' => 'required|max:2',
            'kompkeilmuProfesional' => 'required|max:2',
            'seminarProfesional' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'prilakuKepri.required' => 'Prilaku tidak boleh kosong',
            'prilakuKepri.max' => 'Prilaku nilai max 2 angka',

            'tuturkataKepri.required' => 'Tutur kata tidak boleh kosong',
            'tuturkataKepri.max' => 'Tutur kata nilai max 2 angka',

            'keuanganKepri.required' => 'Keuangan tidak boleh kosong',
            'keuanganKepri.max' => 'Keuangan nilai max 2 angka',

            'kepedulianKepri.required' => 'Kepedulian tidak boleh kosong',
            'kepedulianKepri.max' => 'Kepedulian nilai max 2 angka',

            'persekutuanKepri.required' => 'Persekutuan Doa/ Ibadah tidak boleh kosong',
            'persekutuanKepri.max' => 'Persekutuan Doa/ Ibadah nilai max 2 angka',

            'penampilanKepri.required' => 'Penampilan tidak boleh kosong',
            'penampilanKepri.max' => 'Penampilan nilai max 2 angka',

            'sikapkerjaKepri.required' => 'Sikap kerja tidak boleh kosong',
            'sikapkerjaKepri.max' => 'Sikap kerja nilai max 2 angka',

            'masukkerjaKepri.required' => 'Masuk kerja tidak boleh kosong',
            'masukkerjaKepri.max' => 'Masuk kerja nilai max 2 angka',

            'kesetianyskiKepri.required' => 'Kesetiaan pada YSKI tidak boleh kosong',
            'kesetianyskiKepri.max' => 'Kesetiaan pada YSKI nilai max 2 angka',

            'kesetianpimKepri.required' => 'Kesetiaan pada Pimpinan tidak boleh kosong',
            'kesetianpimKepri.max' => 'Kesetiaan pada Pimpinan nilai max 2 angka',

            'manajkelasPeda.required' => 'Manajemen kelas tidak boleh kosong',
            'manajkelasPeda.max' => 'Manajemen kelas nilai max 2 angka',

            'kualitaspemPeda.required' => 'Kualitas Pembelajaran tidak boleh kosong',
            'kualitaspemPeda.max' => 'Kualitas Pembelajaran nilai max 2 angka',

            'samaortuSos.required' => 'Kerjasama dengan Siswa/ Orang Tua tidak boleh kosong',
            'samaortuSos.max' => 'Kerjasama dengan Siswa/ Orang Tua nilai max 2 angka',

            'samapendSos.required' => 'Kerjasama dengan Pendidik tidak boleh kosong',
            'samapendSos.max' => 'Kerjasama dengan Pendidik nilai max 2 angka',

            'samatenpendSos.required' => 'Kerjasama dengan Tenaga Kependidikan tidak boleh kosong',
            'samatenpendSos.max' => 'Kerjasama dengan Tenaga Kependidikan nilai max 2 angka',

            'organisasiSos.required' => 'Organisasi/ Kegiatan Sekolah tidak boleh kosong',
            'organisasiSos.max' => 'Organisasi/ Kegiatan Sekolah nilai max 2 angka',

            'kompkeilmuProfesional.required' => 'Kompetensi Keilmuan tidak boleh kosong',
            'kompkeilmuProfesional.max' => 'Kompetensi Keilmuan nilai max 2 angka',
            
            'seminarProfesional.required' => 'Seminar / Literasi tidak boleh kosong',
            'seminarProfesional.max' => 'Seminar / Literasi nilai max 2 angka',
        ];
    }
}
