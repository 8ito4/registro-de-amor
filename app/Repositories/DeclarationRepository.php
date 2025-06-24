<?php

namespace App\Repositories;

use App\Models\Declaration;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DeclarationRepository
{
    public function __construct(
        protected Declaration $model
    ) {}

    /**
     * Encontra declaração por ID
     */
    public function findById(int $id): ?Declaration
    {
        return $this->model->find($id);
    }

    /**
     * Encontra declaração por slug
     */
    public function findBySlug(string $slug): ?Declaration
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Lista declarações de um usuário
     */
    public function getByUser(User $user): Collection
    {
        return $this->model->where('user_id', $user->id)
                          ->with(['photos', 'events'])
                          ->orderBy('created_at', 'desc')
                          ->get();
    }

    /**
     * Lista declarações públicas com paginação
     */
    public function getPublicPaginated(int $perPage = 12): LengthAwarePaginator
    {
        return $this->model->public()
                          ->with(['photos' => function ($query) {
                              $query->where('is_featured', true);
                          }])
                          ->orderBy('created_at', 'desc')
                          ->paginate($perPage);
    }

    /**
     * Cria nova declaração
     */
    public function create(array $data): Declaration
    {
        return $this->model->create($data);
    }

    /**
     * Atualiza declaração
     */
    public function update(Declaration $declaration, array $data): Declaration
    {
        $declaration->update($data);
        return $declaration->fresh();
    }

    /**
     * Deleta declaração
     */
    public function delete(Declaration $declaration): bool
    {
        return $declaration->delete();
    }

    /**
     * Marca declaração como paga
     */
    public function markAsPaid(Declaration $declaration): Declaration
    {
        $declaration->update(['has_paid' => true]);
        return $declaration->fresh();
    }

    /**
     * Publica declaração
     */
    public function publish(Declaration $declaration): Declaration
    {
        $declaration->update([
            'status' => 'published',
            'is_public' => true
        ]);
        return $declaration->fresh();
    }

    /**
     * Despublica declaração
     */
    public function unpublish(Declaration $declaration): Declaration
    {
        $declaration->update([
            'status' => 'draft',
            'is_public' => false
        ]);
        return $declaration->fresh();
    }

    /**
     * Conta declarações de um usuário
     */
    public function countByUser(User $user): int
    {
        return $this->model->where('user_id', $user->id)->count();
    }

    /**
     * Declarações recentes públicas
     */
    public function getRecentPublic(int $limit = 6): Collection
    {
        return $this->model->public()
                          ->with(['photos' => function ($query) {
                              $query->where('is_featured', true);
                          }])
                          ->orderBy('created_at', 'desc')
                          ->limit($limit)
                          ->get();
    }

    /**
     * Busca declarações por termo
     */
    public function search(string $term): Collection
    {
        return $this->model->public()
                          ->where(function ($query) use ($term) {
                              $query->where('partner_name_1', 'LIKE', "%{$term}%")
                                    ->orWhere('partner_name_2', 'LIKE', "%{$term}%")
                                    ->orWhere('love_message', 'LIKE', "%{$term}%");
                          })
                          ->with(['photos' => function ($query) {
                              $query->where('is_featured', true);
                          }])
                          ->orderBy('created_at', 'desc')
                          ->get();
    }
} 