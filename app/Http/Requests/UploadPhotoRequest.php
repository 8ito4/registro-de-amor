<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UploadPhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Verifica se o usuário é dono da declaração
        $declaration = $this->route('declaration');
        return Auth::check() && Auth::id() === $declaration->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photos' => [
                'required',
                'array',
                'min:1',
                'max:10'
            ],
            'photos.*' => [
                'required',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'max:10240', // 10MB
                'dimensions:min_width=200,min_height=200,max_width=4000,max_height=4000'
            ],
            'alt_texts' => [
                'sometimes',
                'array'
            ],
            'alt_texts.*' => [
                'nullable',
                'string',
                'max:255'
            ],
            'descriptions' => [
                'sometimes',
                'array'
            ],
            'descriptions.*' => [
                'nullable',
                'string',
                'max:500'
            ],
            'featured_index' => [
                'sometimes',
                'integer',
                'min:0'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'photos.required' => 'Pelo menos uma foto deve ser enviada.',
            'photos.min' => 'Envie pelo menos uma foto.',
            'photos.max' => 'Máximo de 10 fotos por upload.',
            'photos.*.required' => 'Arquivo de foto é obrigatório.',
            'photos.*.image' => 'O arquivo deve ser uma imagem.',
            'photos.*.mimes' => 'Formato de imagem não permitido. Use JPEG, JPG, PNG ou WebP.',
            'photos.*.max' => 'Imagem muito grande. Tamanho máximo: 10MB.',
            'photos.*.dimensions' => 'Dimensões da imagem inválidas. Mínimo: 200x200px, Máximo: 4000x4000px.',
            'alt_texts.*.max' => 'Texto alternativo deve ter no máximo 255 caracteres.',
            'descriptions.*.max' => 'Descrição deve ter no máximo 500 caracteres.',
            'featured_index.integer' => 'Índice da foto destacada deve ser um número.',
            'featured_index.min' => 'Índice da foto destacada deve ser maior ou igual a 0.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'photos' => 'fotos',
            'alt_texts' => 'textos alternativos',
            'descriptions' => 'descrições',
            'featured_index' => 'índice da foto destacada',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            // Valida se o índice da foto destacada existe
            if ($this->has('featured_index')) {
                $featuredIndex = $this->input('featured_index');
                $photosCount = count($this->file('photos', []));
                
                if ($featuredIndex >= $photosCount) {
                    $validator->errors()->add('featured_index', 'Índice da foto destacada inválido.');
                }
            }
        });
    }
}
