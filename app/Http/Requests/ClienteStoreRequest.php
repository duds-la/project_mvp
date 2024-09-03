<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'nome' =>'required'
        ];
    }

    public function messages(): array
    {
        return [
           'nome.min' => 'O nome precisa ter pelo menos 3 caract. !',
           'nome.required' => 'O nome é um campo obrigatório!',
           // 'documento.required' => 'O documento do cliente é um campo obrigatório!',
           // 'documento.unique' => 'Já existe um cliente com esse número de documento!'
        ];
    }
}
