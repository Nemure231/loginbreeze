<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiBarang extends FormRequest
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
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'merek_id' => 'required',
            'satuan_id' => 'required'
        ];
    }


    public function messages(){
        return [
            'nama_barang.required' => 'Harus diisi!',
            'harga_barang.required' => 'Harus diisi!',
            'harga_barang.numeric' => 'Harus angka!',
            'satuan_id.required' => 'Harus dipilih',
            'merek_id.required' => 'Harus dipilih!'
        ];
    }
}
