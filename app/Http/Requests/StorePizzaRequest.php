<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePizzaRequest extends FormRequest
{
    // IMPORTANTE: Altere de false para true, se nao o Laravel vai bloquear o envio do formulário
    public function authorize(): bool
    {
        return true;
    }

    // Regras de validacao para os dados da pizza
    public function rules(): array
    {
        return [
            'nome'         => 'required|string|max:255',
            'descricao'    => 'nullable|string',
            'preco'        => 'required|numeric|min:0.01',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }
}