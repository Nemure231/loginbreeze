<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiEditBarang extends FormRequest
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
            'e_nama_barang' => 'required',
            'e_harga_barang' => 'required|numeric',
            'e_merek_id' => 'required',
            'e_satuan_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'e_nama_barang.required' => 'Harus diisi!',
            'e_harga_barang.required' => 'Harus diisi!',
            'e_harga_barang.numeric' => 'Harus angka!',
            'e_satuan_id.required' => 'Harus diisi',
            'e_merek_id.required' => 'Harus diisi!'
        ];
    }
}
