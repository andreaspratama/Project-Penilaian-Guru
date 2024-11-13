<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DsRequest extends FormRequest
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
            'kepedulianKepri' => 'required|numeric|max:10|min:6',
            'persekutuanKepri' => 'required|numeric|max:10|min:6',
            'kesetiaanyskiKepri' => 'required|numeric|max:10|min:6',
            'kesetiaanpimKepri' => 'required|numeric|max:10|min:6',
            'modelPeda' => 'required|numeric|max:10|min:6',
            'samaortuSos' => 'required|numeric|max:10|min:6',
            'kompkeilmuProfesional' => 'required|numeric|max:10|min:6',
        ];
    }

    public function messages()
    {
        return [
            'kepedulianKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kepedulianKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kepedulianKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'persekutuanKepri.required' => 'Upss, nilai harus diisi yaa...',
            'persekutuanKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'persekutuanKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kesetiaanyskiKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetiaanyskiKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kesetiaanyskiKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kesetiaanpimKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetiaanpimKepri.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kesetiaanpimKepri.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'modelPeda.required' => 'Upss, nilai harus diisi yaa...',
            'modelPeda.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'modelPeda.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'samaortuSos.required' => 'Upss, nilai harus diisi yaa...',
            'samaortuSos.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'samaortuSos.min' => 'Upss, sorry nilai minimal harus 6 yaa...',

            'kompkeilmuProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompkeilmuProfesional.max' => 'Upss, sorry nilai maksimal hanya 10 yaa...',
            'kompkeilmuProfesional.min' => 'Upss, sorry nilai minimal harus 6 yaa...',
        ];
    }
}
