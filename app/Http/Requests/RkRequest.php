<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RkRequest extends FormRequest
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
            'perilakuKepri' => 'required|numeric|max:10|min:6',
            'tuturkataKepri' => 'required|numeric|max:10|min:6',
            'kepedulianKepri' => 'required|numeric|max:10|min:6',
            'penampilanKepri' => 'required|numeric|max:10|min:6',
            'sikerKepri' => 'required|numeric|max:10|min:6',
            'samapendSos' => 'required|numeric|max:10|min:6',
            'samatenpendSos' => 'required|numeric|max:10|min:6',
        ];
    }

    public function messages()
    {
        return [
            'perilakuKepri.required' => 'Upss, nilai harus diisi yaa...',
            'perilakuKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'perilakuKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'tuturkataKepri.required' => 'Upss, nilai harus diisi yaa...',
            'tuturkataKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'tuturkataKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kepedulianKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kepedulianKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kepedulianKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'penampilanKepri.required' => 'Upss, nilai harus diisi yaa...',
            'penampilanKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'penampilanKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'sikerKepri.required' => 'Upss, nilai harus diisi yaa...',
            'sikerKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'sikerKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'samapendSos.required' => 'Upss, nilai harus diisi yaa...',
            'samapendSos.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'samapendSos.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'samatenpendSos.required' => 'Upss, nilai harus diisi yaa...',
            'samatenpendSos.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'samatenpendSos.min' => 'Upss, sorry nilai minimal harus 6 yaa...',
        ];
    }
}
