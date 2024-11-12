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
            'prilakuKepri' => 'required|numeric|max:100|min:60',
            'tuturkataKepri' => 'required|numeric|max:100|min:60',
            'keuanganKepri' => 'required|numeric|max:100|min:60',
            'kepedulianKepri' => 'required|numeric|max:100|min:60',
            'persekutuanKepri' => 'required|numeric|max:100|min:60',
            'penampilanKepri' => 'required|numeric|max:100|min:60',
            'sikapkerjaKepri' => 'required|numeric|max:100|min:60',
            'masukkerjaKepri' => 'required|numeric|max:100|min:60',
            'kesetianyskiKepri' => 'required|numeric|max:100|min:60',
            'kesetianpimKepri' => 'required|numeric|max:100|min:60',
            'manajkelasPeda' => 'required|numeric|max:100|min:60',
            'kualitaspemPeda' => 'required|numeric|max:100|min:60',
            'samaortuSos' => 'required|numeric|max:100|min:60',
            'samapendSos' => 'required|numeric|max:100|min:60',
            'samatenpendSos' => 'required|numeric|max:100|min:60',
            'organisasiSos' => 'required|numeric|max:100|min:60',
            'kompkeilmuProfesional' => 'required|numeric|max:100|min:60',
            'seminarProfesional' => 'required|numeric|max:100|min:60',
        ];
    }

    public function messages()
    {
        return [
            'prilakuKepri.required' => 'Upss, nilai harus diisi yaa...',
            'prilakuKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'prilakuKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'tuturkataKepri.required' => 'Upss, nilai harus diisi yaa...',
            'tuturkataKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'tuturkataKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'keuanganKepri.required' => 'Upss, nilai harus diisi yaa...',
            'keuanganKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'keuanganKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kepedulianKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kepedulianKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kepedulianKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'persekutuanKepri.required' => 'Upss, nilai harus diisi yaa...',
            'persekutuanKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'persekutuanKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'penampilanKepri.required' => 'Upss, nilai harus diisi yaa...',
            'penampilanKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'penampilanKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'sikapkerjaKepri.required' => 'Upss, nilai harus diisi yaa...',
            'sikapkerjaKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'sikapkerjaKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'masukkerjaKepri.required' => 'Upss, nilai harus diisi yaa...',
            'masukkerjaKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'masukkerjaKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kesetianyskiKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetianyskiKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kesetianyskiKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kesetianpimKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetianpimKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kesetianpimKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'manajkelasPeda.required' => 'Upss, nilai harus diisi yaa...',
            'manajkelasPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'manajkelasPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kualitaspemPeda.required' => 'Upss, nilai harus diisi yaa...',
            'kualitaspemPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kualitaspemPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'samaortuSos.required' => 'Upss, nilai harus diisi yaa...',
            'samaortuSos.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'samaortuSos.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'samapendSos.required' => 'Upss, nilai harus diisi yaa...',
            'samapendSos.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'samapendSos.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'samatenpendSos.required' => 'Upss, nilai harus diisi yaa...',
            'samatenpendSos.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'samatenpendSos.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'organisasiSos.required' => 'Upss, nilai harus diisi yaa...',
            'organisasiSos.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'organisasiSos.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kompkeilmuProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompkeilmuProfesional.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kompkeilmuProfesional.min' => 'Upss, sorry nilai minimal harus 60 yaa...',
            
            'seminarProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'seminarProfesional.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'seminarProfesional.min' => 'Upss, sorry nilai minimal harus 60 yaa...',
        ];
    }
}
