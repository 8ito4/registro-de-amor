<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\Declaration;
use Illuminate\Database\Eloquent\Collection;

class EventRepository
{
    public function __construct(
        protected Event $model
    ) {}

    /**
     * Encontra evento por ID
     */
    public function findById(int $id): ?Event
    {
        return $this->model->find($id);
    }

    /**
     * Lista eventos de uma declaração
     */
    public function getByDeclaration(Declaration $declaration): Collection
    {
        return $this->model->where('declaration_id', $declaration->id)
                          ->visible()
                          ->orderedByDate()
                          ->get();
    }

    /**
     * Lista eventos de uma declaração (incluindo invisíveis)
     */
    public function getAllByDeclaration(Declaration $declaration): Collection
    {
        return $this->model->where('declaration_id', $declaration->id)
                          ->orderedByDate()
                          ->get();
    }

    /**
     * Cria novo evento
     */
    public function create(array $data): Event
    {
        return $this->model->create($data);
    }

    /**
     * Atualiza evento
     */
    public function update(Event $event, array $data): Event
    {
        $event->update($data);
        return $event->fresh();
    }

    /**
     * Deleta evento
     */
    public function delete(Event $event): bool
    {
        return $event->delete();
    }

    /**
     * Atualiza ordem dos eventos
     */
    public function updateOrder(array $eventIds): void
    {
        foreach ($eventIds as $index => $eventId) {
            $this->model->where('id', $eventId)
                       ->update(['order' => $index + 1]);
        }
    }

    /**
     * Alterna visibilidade do evento
     */
    public function toggleVisibility(Event $event): Event
    {
        $event->update(['is_visible' => !$event->is_visible]);
        return $event->fresh();
    }

    /**
     * Conta eventos de uma declaração
     */
    public function countByDeclaration(Declaration $declaration): int
    {
        return $this->model->where('declaration_id', $declaration->id)
                          ->visible()
                          ->count();
    }

    /**
     * Obtém eventos por tipo
     */
    public function getByType(Declaration $declaration, string $type): Collection
    {
        return $this->model->where('declaration_id', $declaration->id)
                          ->where('event_type', $type)
                          ->visible()
                          ->orderedByDate()
                          ->get();
    }
} 