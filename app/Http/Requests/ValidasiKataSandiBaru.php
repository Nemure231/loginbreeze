<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiKataSandiBaru extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

    public function messages(){
        return [
            'token.required' => 'Harus diisi!',
            'email.required' => 'Harus diisi!',
            'email.email' => 'Harus bertipe e-mail!',
            'password.required' => 'Harus diisi!',
            'password.string' => 'Harus bertipe string!',
            'password.confirmed' => 'Konfirmasi kata sandi harus sama!',
            'password.min' => 'Terlalu pendek!'
        ];
    }
}
