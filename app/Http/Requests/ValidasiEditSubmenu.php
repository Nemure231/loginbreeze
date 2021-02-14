<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiEditSubmenu extends FormRequest
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
            'e_menu_id' => 'required',
            'e_nama_submenu' => 'required',
            'e_route_submenu' => 'required',
            'e_url_submenu' => 'required'
            
        ];
    }


    public function messages(){
        return [
            'e_menu_id.required' => 'Harus dipilih!',
            'e_nama_submenu.required' => 'Harus diisi!',
            'e_route_submenu.required' => 'Harus diisi!',
            'e_url_submenu.required' => 'Harus diisi!'
        ];
    }
}
