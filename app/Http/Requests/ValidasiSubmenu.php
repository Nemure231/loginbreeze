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
            'nama_submenu' => 'required',
            'route_submenu' => 'required',
            'url_submenu' => 'required'
            
        ];
    }


    public function messages(){
        return [
            'menu_id.required' => 'Harus dipilih!',
            'nama_submenu.required' => 'Harus diisi!',
            'route_submenu.required' => 'Harus diisi!',
            'url_submenu.required' => 'Harus diisi!'
        ];
    }
}
