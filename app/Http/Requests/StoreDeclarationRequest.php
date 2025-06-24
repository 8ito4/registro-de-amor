<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeclarationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'partner_name_1' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-ZÀ-ÿ\s]+$/'
            ],
            'partner_name_2' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-ZÀ-ÿ\s]+$/'
            ],
            'relationship_start_date' => [
                'required',
                'date',
                'before_or_equal:today',
                'after:1900-01-01'
            ],
            'love_message' => [
                'nullable',
                'string',
                'max:500'
            ],
            'love_letter' => [
                'nullable',
                'string',
                'max:5000'
            ],
            'theme' => [
                'nullable',
                'string',
                'in:classic,romantic,modern,vintage,minimal'
            ],
            'background_music' => [
                'nullable',
                'string',
                'max:255',
                'url'
            ],
            'settings' => [
                'nullable',
                'array'
            ],
            'settings.colors' => [
                'nullable',
                'array'
            ],
            'settings.colors.primary' => [
                'nullable',
                'string',
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'
            ],
            'settings.colors.secondary' => [
                'nullable',
                'string',
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'
            ],
            'settings.effects' => [
                'nullable',
                'array'
            ],
            'settings.effects.hearts' => [
                'nullable',
                'boolean'
            ],
            'settings.effects.particles' => [
                'nullable',
                'boolean'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'partner_name_1.required' => 'O nome do primeiro parceiro é obrigatório.',
            'partner_name_1.regex' => 'O nome deve conter apenas letras e espaços.',
            'partner_name_2.required' => 'O nome do segundo parceiro é obrigatório.',
            'partner_name_2.regex' => 'O nome deve conter apenas letras e espaços.',
            'relationship_start_date.required' => 'A data de início do relacionamento é obrigatória.',
            'relationship_start_date.before_or_equal' => 'A data não pode ser no futuro.',
            'relationship_start_date.after' => 'A data deve ser posterior a 1900.',
            'love_message.max' => 'A mensagem de amor deve ter no máximo 500 caracteres.',
            'love_letter.max' => 'A carta de amor deve ter no máximo 5000 caracteres.',
            'theme.in' => 'Tema inválido. Escolha entre: classic, romantic, modern, vintage, minimal.',
            'background_music.url' => 'A URL da música de fundo deve ser válida.',
            'settings.colors.primary.regex' => 'A cor primária deve estar no formato hexadecimal (#000000).',
            'settings.colors.secondary.regex' => 'A cor secundária deve estar no formato hexadecimal (#000000).',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'partner_name_1' => 'primeiro nome',
            'partner_name_2' => 'segundo nome',
            'relationship_start_date' => 'data de início',
            'love_message' => 'mensagem de amor',
            'love_letter' => 'carta de amor',
            'theme' => 'tema',
            'background_music' => 'música de fundo',
        ];
    }
}
