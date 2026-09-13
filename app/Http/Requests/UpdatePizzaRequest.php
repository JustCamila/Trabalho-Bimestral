<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePizzaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
