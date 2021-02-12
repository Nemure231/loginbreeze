<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiRegister extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ];
    }


    public function messages(){
        return [
            'name.required' => 'Harus diisi!',
            'name.string' => 'Harus string!',
            'name.max' => 'Tidak boleh lebih dari 225 huruf!',
            'email.required' => 'Harus diisi',
            'email.string' => 'Harus string!',
            'email.email' => 'Harus bertipe e-mail!',
            'email.max' => 'Tidak boleh lebih dari 225 huruf!',
            'email.unique' => 'E-mail tersebut sudah terdaftar!',
            'password.required' => 'Harus diisi!',
            'password.string' => 'Harus string!',
            'password.confirmed' => 'Konfrimasi kata sandi harus sama!',
            'password.min' => 'Tidak boleh kurang dari 8!',
        ];
    }
}
