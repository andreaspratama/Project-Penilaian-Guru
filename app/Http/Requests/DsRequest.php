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
            'kepedulianKepri' => 'required|numeric|max:100|min:60',
            'persekutuanKepri' => 'required|numeric|max:100|min:60',
            'kesetiaanyskiKepri' => 'required|numeric|max:100|min:60',
            'kesetiaanpimKepri' => 'required|numeric|max:100|min:60',
            'modelPeda' => 'required|numeric|max:100|min:60',
            'samaortuSos' => 'required|numeric|max:100|min:60',
            'kompkeilmuProfesional' => 'required|numeric|max:100|min:60',
        ];
    }

    public function messages()
    {
        return [
            'kepedulianKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kepedulianKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kepedulianKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'persekutuanKepri.required' => 'Upss, nilai harus diisi yaa...',
            'persekutuanKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'persekutuanKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kesetiaanyskiKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetiaanyskiKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kesetiaanyskiKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kesetiaanpimKepri.required' => 'Upss, nilai harus diisi yaa...',
            'kesetiaanpimKepri.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kesetiaanpimKepri.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'modelPeda.required' => 'Upss, nilai harus diisi yaa...',
            'modelPeda.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'modelPeda.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'samaortuSos.required' => 'Upss, nilai harus diisi yaa...',
            'samaortuSos.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'samaortuSos.min' => 'Upss, sorry nilai minimal harus 60 yaa...',

            'kompkeilmuProfesional.required' => 'Upss, nilai harus diisi yaa...',
            'kompkeilmuProfesional.max' => 'Upss, sorry nilai maksimal hanya 100 yaa...',
            'kompkeilmuProfesional.min' => 'Upss, sorry nilai minimal harus 60 yaa...',
        ];
    }
}
