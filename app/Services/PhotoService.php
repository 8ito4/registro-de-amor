<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Declaration;
use App\Repositories\PhotoRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PhotoService
{
    public function __construct(
        protected PhotoRepository $photoRepository
    ) {}

    /**
     * Faz upload de foto
     */
    public function upload(Declaration $declaration, UploadedFile $file, array $data = []): Photo
    {
        // Validações
        $this->validateFile($file);

        // Gera nome único
        $filename = $this->generateUniqueFilename($file);
        $path = 'declarations/' . $declaration->id . '/photos/' . $filename;

        // Redimensiona e otimiza a imagem
        $processedImage = $this->processImage($file);
        Storage::put($path, $processedImage);

        // Calcula ordem se não especificada
        $order = $data['order'] ?? ($this->photoRepository->countByDeclaration($declaration) + 1);

        // Cria registro no banco
        return $this->photoRepository->create([
            'declaration_id' => $declaration->id,
            'filename' => $filename,
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
            'alt_text' => $data['alt_text'] ?? '',
            'description' => $data['description'] ?? '',
            'order' => $order,
            'is_featured' => $data['is_featured'] ?? false,
            'size' => $this->formatFileSize($file->getSize()),
            'mime_type' => $file->getMimeType(),
        ]);
    }

    /**
     * Faz upload múltiplo de fotos
     */
    public function uploadMultiple(Declaration $declaration, array $files): array
    {
        $uploadedPhotos = [];
        
        foreach ($files as $index => $file) {
            $uploadedPhotos[] = $this->upload($declaration, $file, [
                'order' => $this->photoRepository->countByDeclaration($declaration) + $index + 1
            ]);
        }

        return $uploadedPhotos;
    }

    /**
     * Atualiza foto
     */
    public function update(Photo $photo, array $data): Photo
    {
        $updateData = array_filter([
            'alt_text' => $data['alt_text'] ?? null,
            'description' => $data['description'] ?? null,
            'order' => $data['order'] ?? null,
            'is_featured' => $data['is_featured'] ?? null,
        ], fn($value) => $value !== null);

        return $this->photoRepository->update($photo, $updateData);
    }

    /**
     * Define foto como destaque
     */
    public function setAsFeatured(Photo $photo): Photo
    {
        return $this->photoRepository->setAsFeatured($photo);
    }

    /**
     * Atualiza ordem das fotos
     */
    public function updateOrder(array $photoIds): void
    {
        $this->photoRepository->updateOrder($photoIds);
    }

    /**
     * Deleta foto
     */
    public function delete(Photo $photo): bool
    {
        // A exclusão do arquivo será feita pelo observer do model
        return $this->photoRepository->delete($photo);
    }

    /**
     * Processa imagem (redimensiona e otimiza)
     */
    protected function processImage(UploadedFile $file): string
    {
        $image = Image::make($file->getPathname());

        // Redimensiona mantendo proporção (máximo 1920x1080)
        $image->resize(1920, 1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Otimiza qualidade
        $image->encode('jpg', 85);

        return $image->stream()->getContents();
    }

    /**
     * Gera nome único para o arquivo
     */
    protected function generateUniqueFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        return Str::random(40) . '.' . $extension;
    }

    /**
     * Valida arquivo de imagem
     */
    protected function validateFile(UploadedFile $file): void
    {
        // Validações de tipo
        $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedMimes)) {
            throw new \Exception('Tipo de arquivo não permitido. Use JPEG, PNG ou WebP.');
        }

        // Validação de tamanho (máximo 10MB)
        if ($file->getSize() > 10 * 1024 * 1024) {
            throw new \Exception('Arquivo muito grande. Tamanho máximo: 10MB.');
        }

        // Validação de dimensões
        $imageInfo = getimagesize($file->getPathname());
        if ($imageInfo === false) {
            throw new \Exception('Arquivo não é uma imagem válida.');
        }

        [$width, $height] = $imageInfo;
        if ($width < 200 || $height < 200) {
            throw new \Exception('Imagem muito pequena. Mínimo: 200x200 pixels.');
        }
    }

    /**
     * Formata tamanho do arquivo
     */
    protected function formatFileSize(int $size): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $unitIndex = 0;
        
        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }
        
        return round($size, 2) . ' ' . $units[$unitIndex];
    }

    /**
     * Cria galeria otimizada para visualização
     */
    public function getGalleryData(Declaration $declaration): array
    {
        $photos = $this->photoRepository->getByDeclaration($declaration);
        
        return $photos->map(function ($photo) {
            return [
                'id' => $photo->id,
                'url' => $photo->url,
                'full_url' => $photo->full_url,
                'alt_text' => $photo->alt_text,
                'description' => $photo->description,
                'is_featured' => $photo->is_featured,
                'order' => $photo->order,
            ];
        })->toArray();
    }
} 