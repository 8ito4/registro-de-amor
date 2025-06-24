<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Declaration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'partner_name_1',
        'partner_name_2',
        'relationship_start_date',
        'love_message',
        'love_letter',
        'theme',
        'background_music',
        'slug',
        'qr_code_path',
        'is_public',
        'is_active',
        'has_paid',
        'status',
        'settings',
    ];

    protected $casts = [
        'relationship_start_date' => 'date',
        'is_public' => 'boolean',
        'is_active' => 'boolean',
        'has_paid' => 'boolean',
        'settings' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($declaration) {
            $declaration->slug = $declaration->generateUniqueSlug();
        });
    }

    /**
     * Relacionamento com User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com Photos
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class)->orderBy('order');
    }

    /**
     * Relacionamento com Events
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class)->orderBy('event_date');
    }

    /**
     * Foto em destaque
     */
    public function featuredPhoto()
    {
        return $this->photos()->where('is_featured', true)->first();
    }

    /**
     * Calcula tempo de relacionamento
     */
    public function getTimeTogether(): array
    {
        $start = Carbon::parse($this->relationship_start_date);
        $now = Carbon::now();
        
        $diff = $start->diff($now);
        
        return [
            'years' => $diff->y,
            'months' => $diff->m,
            'days' => $diff->d,
            'hours' => $now->diffInHours($start->startOfDay()),
            'minutes' => $now->diffInMinutes($start->startOfDay()),
            'seconds' => $now->diffInSeconds($start->startOfDay()),
            'total_days' => $start->diffInDays($now),
        ];
    }

    /**
     * Gera slug único
     */
    protected function generateUniqueSlug(): string
    {
        $baseSlug = Str::slug($this->partner_name_1 . '-' . $this->partner_name_2);
        $slug = $baseSlug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Scope para declarações públicas
     */
    public function scopePublic($query)
    {
        return $query->where('is_public', true)
                    ->where('is_active', true)
                    ->where('has_paid', true);
    }

    /**
     * Scope para declarações ativas
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * URL pública da declaração
     */
    public function getPublicUrlAttribute(): string
    {
        return route('declaration.show', $this->slug);
    }

    /**
     * Verifica se a declaração pode ser publicada
     */
    public function canBePublished(): bool
    {
        return $this->has_paid && $this->is_active;
    }
}
