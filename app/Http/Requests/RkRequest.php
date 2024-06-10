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
            'perilakuKepri' => 'required|max:2',
            'tuturkataKepri' => 'required|max:2',
            'kepedulianKepri' => 'required|max:2',
            'penampilanKepri' => 'required|max:2',
            'sikerKepri' => 'required|max:2',
            'samapendSos' => 'required|max:2',
            'samatenpendSos' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'perilakuKepri.required' => 'Prilaku tidak boleh kosong',
            'perilakuKepri.max' => 'Prilaku nilai max 2 angka',

            'tuturkataKepri.required' => 'Tutur kata tidak boleh kosong',
            'tuturkataKepri.max' => 'Tutur kata nilai max 2 angka',

            'kepedulianKepri.required' => 'Kepedulian tidak boleh kosong',
            'kepedulianKepri.max' => 'Kepedulian nilai max 2 angka',

            'penampilanKepri.required' => 'Penampilan tidak boleh kosong',
            'penampilanKepri.max' => 'Penampilan nilai max 2 angka',

            'sikerKepri.required' => 'Sikap kerja tidak boleh kosong',
            'sikerKepri.max' => 'Sikap kerja nilai max 2 angka',

            'samapendSos.required' => 'Kerjasama dengan Pendidik tidak boleh kosong',
            'samapendSos.max' => 'Kerjasama dengan Pendidik nilai max 2 angka',

            'samatenpendSos.required' => 'Kerjasama dengan Tenaga Kependidikan tidak boleh kosong',
            'samatenpendSos.max' => 'Kerjasama dengan Tenaga Kependidikan nilai max 2 angka',
        ];
    }
}
