<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferenciaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'conta_id' => 'required|integer|exists:contas,conta_id',
            'valor' => 'required|numeric|min:1',
            'forma_pagamento' => 'required|string|min:1'
        ];
    }

    public function messages()
    {
        return [
            'conta_id.required' => 'O campo conta_id é obrigatório.',
            'conta_id.integer' => 'O campo conta_id deve ser um número inteiro.',
            'conta_id.exists' => 'O conta_id informado não existe.',

            'valor.required' => 'O campo valor é obrigatório.',
            'valor.numeric' => 'O campo valor deve ser numérico.',
            'valor.min' => 'O valor deve ser no mínimo 1.',

            'forma_pagamento.required' => 'O campo forma de pagamento é obrigatório.',
            'forma_pagamento.string' => 'O campo forma de pagamento deve ser uma string.',
            'forma_pagamento.min' => 'O campo forma de pagamento não pode estar vazio.',
        ];
    }
}
