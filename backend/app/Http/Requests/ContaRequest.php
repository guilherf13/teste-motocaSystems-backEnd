<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContaRequest extends FormRequest
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
            'conta_id' => 'required|integer|unique:contas',
            'valor' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'conta_id.required' => 'O identificador da conta é obrigatório.',
            'conta_id.unique' => 'Uma conta com este identificador já existe.',
            'valor.required' => 'O valor inicial é obrigatório.',
            'valor.numeric' => 'O valor inicial deve ser um número.',
            'valor.min' => 'O valor minimo precisa ser maior ou igual a 0',
        ];
    }
}
