<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'declaration_id',
        'title',
        'description',
        'event_date',
        'event_type',
        'icon',
        'photo_path',
        'order',
        'is_visible',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_visible' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Relacionamento com Declaration
     */
    public function declaration(): BelongsTo
    {
        return $this->belongsTo(Declaration::class);
    }

    /**
     * URL da foto do evento (se existir)
     */
    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo_path ? Storage::url($this->photo_path) : null;
    }

    /**
     * URL completa da foto do evento
     */
    public function getFullPhotoUrlAttribute(): ?string
    {
        return $this->photo_path ? url(Storage::url($this->photo_path)) : null;
    }

    /**
     * Scope para eventos visíveis
     */
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    /**
     * Scope para ordenar por data
     */
    public function scopeOrderedByDate($query)
    {
        return $query->orderBy('event_date');
    }

    /**
     * Scope para ordenar por ordem personalizada
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Formata a data do evento
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->event_date->format('d/m/Y');
    }

    /**
     * Ícone padrão baseado no tipo do evento
     */
    public function getDefaultIconAttribute(): string
    {
        return match($this->event_type) {
            'anniversary' => '💕',
            'milestone' => '🎉',
            'special_moment' => '✨',
            'travel' => '✈️',
            'proposal' => '💍',
            'wedding' => '👰‍♀️',
            default => '❤️'
        };
    }

    /**
     * Deleta a foto do storage quando o modelo é deletado
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            if ($event->photo_path && Storage::exists($event->photo_path)) {
                Storage::delete($event->photo_path);
            }
        });
    }
}
