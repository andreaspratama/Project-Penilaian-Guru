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
            'penamKepri' => 'required|numeric|max:100|min:60',
            'sikerKepri' => 'required|numeric|max:100|min:60',
            'maskerKepri' => 'required|numeric|max:100|min:60',
            'kesetiaanpimKepri' => 'required|numeric|max:100|min:60',
            'valuePeda' => 'required|numeric|max:100|min:60',
            'manajkelasPeda' => 'required|numeric|max:100|min:60',
            'lmsPeda' => 'required|numeric|max:100|min:60',
            'modelpemPeda' => 'required|numeric|max:100|min:60',
            'mediaPeda' => 'required|numeric|max:100|min:60',
            'kualitaspemPeda' => 'required|numeric|max:100|min:60',
            'samapendSos' => 'required|numeric|max:100|min:60',
            'organisasiSos' => 'required|numeric|max:100|min:60',
            'kompkeilmuProfesional' => 'required|numeric|max:100|min:60',
            'kompdigProfesional' => 'required|numeric|max:100|min:60',
            'seminarProfesional' => 'required|numeric|max:100|min:60',
        ];
    }

    public function messages()
    {
        return [
            'penamKepri.required' => 'Upss, nilai harus diisi yaa...',
            'penamKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'penamKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'sikerKepri.required' => 'Upss, nilai harus diisi yaa...',
            'sikerKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'sikerKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'maskerKepri.required' => 'Upss, nilai harus diisi yaa...',
            'maskerKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'maskerKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kesetiaanpimKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetiaanpimKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kesetiaanpimKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'valuePeda.required' => 'Upss, nilai harus diisi yaa...',
            'valuePeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'valuePeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'manajkelasPeda.required' => 'Upss, nilai harus diisi yaa...',
            'manajkelasPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'manajkelasPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'lmsPeda.required' => 'Upss, nilai harus diisi yaa...',
            'lmsPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'lmsPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'modelpemPeda.required' => 'Upss, nilai harus diisi yaa...',
            'modelpemPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'modelpemPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'mediaPeda.required' => 'Upss, nilai harus diisi yaa...',
            'mediaPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'mediaPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kualitaspemPeda.required' => 'Upss, nilai harus diisi yaa...',
            'kualitaspemPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kualitaspemPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'samapendSos.required' => 'Upss, nilai harus diisi yaa...',
            'samapendSos.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'samapendSos.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'organisasiSos.required' => 'Upss, nilai harus diisi yaa...',
            'organisasiSos.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'organisasiSos.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kompkeilmuProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompkeilmuProfesional.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kompkeilmuProfesional.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kompdigProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompdigProfesional.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kompdigProfesional.min' => 'Upss, sorry nilai minimal harus 60 yaa...',
            
            'seminarProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'seminarProfesional.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'seminarProfesional.min' => 'Upss, sorry nilai minimal harus 60 yaa...',
        ];
    }
}
