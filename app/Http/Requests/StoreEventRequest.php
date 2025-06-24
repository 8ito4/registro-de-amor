<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEventRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:3',
                'max:150'
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000'
            ],
            'event_date' => [
                'required',
                'date',
                'after:1900-01-01',
                'before_or_equal:today'
            ],
            'event_type' => [
                'required',
                'string',
                'in:milestone,anniversary,special_moment,travel,proposal,wedding,first_meeting,first_kiss,first_date,moving_together,engagement,other'
            ],
            'icon' => [
                'nullable',
                'string',
                'max:10'
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'max:5120', // 5MB
                'dimensions:min_width=200,min_height=200,max_width=2000,max_height=2000'
            ],
            'order' => [
                'sometimes',
                'integer',
                'min:1'
            ],
            'is_visible' => [
                'sometimes',
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
            'title.required' => 'O título do evento é obrigatório.',
            'title.min' => 'O título deve ter pelo menos 3 caracteres.',
            'title.max' => 'O título deve ter no máximo 150 caracteres.',
            'description.max' => 'A descrição deve ter no máximo 1000 caracteres.',
            'event_date.required' => 'A data do evento é obrigatória.',
            'event_date.after' => 'A data deve ser posterior a 1900.',
            'event_date.before_or_equal' => 'A data não pode ser no futuro.',
            'event_type.required' => 'O tipo de evento é obrigatório.',
            'event_type.in' => 'Tipo de evento inválido.',
            'icon.max' => 'O ícone deve ter no máximo 10 caracteres.',
            'photo.image' => 'O arquivo deve ser uma imagem.',
            'photo.mimes' => 'Formato de imagem não permitido. Use JPEG, JPG, PNG ou WebP.',
            'photo.max' => 'Imagem muito grande. Tamanho máximo: 5MB.',
            'photo.dimensions' => 'Dimensões da imagem inválidas. Mínimo: 200x200px, Máximo: 2000x2000px.',
            'order.integer' => 'A ordem deve ser um número.',
            'order.min' => 'A ordem deve ser maior que 0.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'title' => 'título',
            'description' => 'descrição',
            'event_date' => 'data do evento',
            'event_type' => 'tipo de evento',
            'icon' => 'ícone',
            'photo' => 'foto',
            'order' => 'ordem',
            'is_visible' => 'visibilidade',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $declaration = $this->route('declaration');
            $eventDate = $this->input('event_date');
            
            // Valida se a data do evento não é anterior ao início do relacionamento
            if ($declaration && $eventDate) {
                $relationshipStart = $declaration->relationship_start_date;
                
                if ($eventDate < $relationshipStart->format('Y-m-d')) {
                    $validator->errors()->add(
                        'event_date', 
                        'A data do evento não pode ser anterior ao início do relacionamento (' . 
                        $relationshipStart->format('d/m/Y') . ').'
                    );
                }
            }
        });
    }
}
