<?php

namespace App\Repositories;

use App\Models\Photo;
use App\Models\Declaration;
use Illuminate\Database\Eloquent\Collection;

class PhotoRepository
{
    public function __construct(
        protected Photo $model
    ) {}

    /**
     * Encontra foto por ID
     */
    public function findById(int $id): ?Photo
    {
        return $this->model->find($id);
    }

    /**
     * Lista fotos de uma declaração
     */
    public function getByDeclaration(Declaration $declaration): Collection
    {
        return $this->model->where('declaration_id', $declaration->id)
                          ->ordered()
                          ->get();
    }

    /**
     * Obtém foto em destaque de uma declaração
     */
    public function getFeaturedByDeclaration(Declaration $declaration): ?Photo
    {
        return $this->model->where('declaration_id', $declaration->id)
                          ->featured()
                          ->first();
    }

    /**
     * Cria nova foto
     */
    public function create(array $data): Photo
    {
        return $this->model->create($data);
    }

    /**
     * Atualiza foto
     */
    public function update(Photo $photo, array $data): Photo
    {
        $photo->update($data);
        return $photo->fresh();
    }

    /**
     * Deleta foto
     */
    public function delete(Photo $photo): bool
    {
        return $photo->delete();
    }

    /**
     * Atualiza ordem das fotos
     */
    public function updateOrder(array $photoIds): void
    {
        foreach ($photoIds as $index => $photoId) {
            $this->model->where('id', $photoId)
                       ->update(['order' => $index + 1]);
        }
    }

    /**
     * Define foto como destaque
     */
    public function setAsFeatured(Photo $photo): Photo
    {
        // Remove destaque de outras fotos da mesma declaração
        $this->model->where('declaration_id', $photo->declaration_id)
                   ->where('id', '!=', $photo->id)
                   ->update(['is_featured' => false]);
        
        // Define esta como destaque
        $photo->update(['is_featured' => true]);
        
        return $photo->fresh();
    }

    /**
     * Conta fotos de uma declaração
     */
    public function countByDeclaration(Declaration $declaration): int
    {
        return $this->model->where('declaration_id', $declaration->id)->count();
    }
} 