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
            'penamKepri' => 'required|numeric|max:10|min:6',
            'sikerKepri' => 'required|numeric|max:10|min:6',
            'maskerKepri' => 'required|numeric|max:10|min:6',
            'kesetiaanpimKepri' => 'required|numeric|max:10|min:6',
            'valuePeda' => 'required|numeric|max:10|min:6',
            'manajkelasPeda' => 'required|numeric|max:10|min:6',
            'lmsPeda' => 'required|numeric|max:10|min:6',
            'modelpemPeda' => 'required|numeric|max:10|min:6',
            'mediaPeda' => 'required|numeric|max:10|min:6',
            'kualitaspemPeda' => 'required|numeric|max:10|min:6',
            'samapendSos' => 'required|numeric|max:10|min:6',
            'organisasiSos' => 'required|numeric|max:10|min:6',
            'kompkeilmuProfesional' => 'required|numeric|max:10|min:6',
            'kompdigProfesional' => 'required|numeric|max:10|min:6',
            'seminarProfesional' => 'required|numeric|max:10|min:6',
        ];
    }

    public function messages()
    {
        return [
            'penamKepri.required' => 'Upss, nilai harus diisi yaa...',
            'penamKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'penamKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'sikerKepri.required' => 'Upss, nilai harus diisi yaa...',
            'sikerKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'sikerKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'maskerKepri.required' => 'Upss, nilai harus diisi yaa...',
            'maskerKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'maskerKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kesetiaanpimKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetiaanpimKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kesetiaanpimKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'valuePeda.required' => 'Upss, nilai harus diisi yaa...',
            'valuePeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'valuePeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'manajkelasPeda.required' => 'Upss, nilai harus diisi yaa...',
            'manajkelasPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'manajkelasPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'lmsPeda.required' => 'Upss, nilai harus diisi yaa...',
            'lmsPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'lmsPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'modelpemPeda.required' => 'Upss, nilai harus diisi yaa...',
            'modelpemPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'modelpemPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'mediaPeda.required' => 'Upss, nilai harus diisi yaa...',
            'mediaPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'mediaPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kualitaspemPeda.required' => 'Upss, nilai harus diisi yaa...',
            'kualitaspemPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kualitaspemPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'samapendSos.required' => 'Upss, nilai harus diisi yaa...',
            'samapendSos.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'samapendSos.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'organisasiSos.required' => 'Upss, nilai harus diisi yaa...',
            'organisasiSos.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'organisasiSos.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kompkeilmuProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompkeilmuProfesional.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kompkeilmuProfesional.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kompdigProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompdigProfesional.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kompdigProfesional.min' => 'Upss, sorry nilai minimal harus 6 yaa...',
            
            'seminarProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'seminarProfesional.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'seminarProfesional.min' => 'Upss, sorry nilai minimal harus 6 yaa...',
        ];
    }
}
