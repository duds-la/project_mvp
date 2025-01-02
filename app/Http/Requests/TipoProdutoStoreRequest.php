<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoProdutoStoreRequest extends FormRequest
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
            'codigo' => 'required|min:3|unique:tipos_servicos',
            'classificacao' => 'required|min:3|unique:tipos_servicos',
            'situacao' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'O código é um campo obrigatório!',
            'codigo.unique' => 'O código dever ser único!',
            'codigo.min' => 'O código precisa ter pelo menos 3 caract. !',
            'classificacao.required' => 'A classificação é um campo obrigatório!',
            'classificacao.unique' => 'A classificação dever ser única!',
            'classificacao.min' => 'A classificação precisa ter pelo menos 3 caract. !',
            'situacao.required' => 'A situação é um campo obrigatório!',
        ];
    }
}
