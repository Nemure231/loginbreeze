<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiMenu extends FormRequest
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
            'nama_menu' => 'required|unique:menu',
            'route_menu' => 'required|unique:menu'
            
        ];
    }


    public function messages(){
        return [
            'nama_menu.required' => 'Harus diisi!',
            'nama_menu.unique' => 'Menu itu sudah ada!',
            'route_menu.required' => 'Harus diisi!',
            'route_menu.unique' => 'Route itu sudah ada!'
        ];
    }
}
