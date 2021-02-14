<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ValidasiExcelBarang extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'excel_barang' => 'required|mimes:xlsx,xls'
            
        ];
    }

    public function messages(){
        return [
            'excel_barang.required' => 'Harus diisi!',
            'excel_barang.mimes' => 'Tipe file tidak mendukung!'
        ];
    }
}
