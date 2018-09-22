<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContacts extends FormRequest
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
            'name' => 'required|max:128',
            'email' => 'required|max:128|email',
            'telephone' => 'required|numeric|digits_between:10,11',
            'message' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'É obrigatório digitar um nome.',
            'name.max' => 'Nome tem que possuir no máximo :max caracteres.',
            'email.required' => 'É obrigatório digitar um email.',
            'email.max' => 'E-mail tem que possuir no máximo :max caracteres.',
            'email.email' => 'O e-mail é invalido',
            'telephone.required' => 'É obrigatório digitar um telefone.',
            'telephone.digits_between' => 'Número de telefone tem que possuir no mínimo :min e no máximo :max caracteres.',
            'telephone.numeric' => 'Digite apenas numeros no campo telefone.',
            'message.required' => 'É obrigatório digitar uma mensagem.'
        ];
    }
}
