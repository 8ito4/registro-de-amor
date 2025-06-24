<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'declaration_id',
        'filename',
        'original_name',
        'path',
        'alt_text',
        'description',
        'order',
        'is_featured',
        'size',
        'mime_type',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
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
     * URL completa da foto
     */
    public function getUrlAttribute(): string
    {
        return Storage::url($this->path);
    }

    /**
     * URL completa da foto com domínio
     */
    public function getFullUrlAttribute(): string
    {
        return url(Storage::url($this->path));
    }

    /**
     * Scope para fotos em destaque
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope para ordenar por ordem
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Deleta a foto do storage quando o modelo é deletado
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($photo) {
            if (Storage::exists($photo->path)) {
                Storage::delete($photo->path);
            }
        });
    }
}
