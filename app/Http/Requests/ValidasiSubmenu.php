<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiSubmenu extends FormRequest
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
            'menu_id' => 'required',
            'nama_submenu' => 'required|unique:submenu',
            'url_submenu' => 'required|unique:submenu'
            
        ];
    }


    public function messages(){
        return [
            'menu_id.required' => 'Harus dipilih!',
            'nama_submenu.required' => 'Harus diisi!',
            'nama_submenu.unique' => 'Nama itu sudah ada!',
            'url_submenu.required' => 'Harus diisi!',
            'url_submenu.unique' => 'Url itu sudah ada!'
        ];
    }
}
