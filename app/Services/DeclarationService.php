<?php

namespace App\Services;

use App\Models\Declaration;
use App\Models\User;
use App\Repositories\DeclarationRepository;
use App\Repositories\PaymentRepository;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DeclarationService
{
    public function __construct(
        protected DeclarationRepository $declarationRepository,
        protected PaymentRepository $paymentRepository
    ) {}

    /**
     * Cria nova declaração
     */
    public function create(User $user, array $data): Declaration
    {
        $declarationData = [
            'user_id' => $user->id,
            'partner_name_1' => $data['partner_name_1'],
            'partner_name_2' => $data['partner_name_2'],
            'relationship_start_date' => $data['relationship_start_date'],
            'love_message' => $data['love_message'] ?? null,
            'love_letter' => $data['love_letter'] ?? null,
            'theme' => $data['theme'] ?? 'classic',
            'background_music' => $data['background_music'] ?? null,
            'settings' => $data['settings'] ?? [],
            'status' => 'draft'
        ];

        return $this->declarationRepository->create($declarationData);
    }

    /**
     * Atualiza declaração
     */
    public function update(Declaration $declaration, array $data): Declaration
    {
        // Verifica se o usuário pode editar
        if (!$this->canEdit($declaration)) {
            throw new \Exception('Declaração não pode ser editada no estado atual.');
        }

        $updateData = array_filter([
            'partner_name_1' => $data['partner_name_1'] ?? null,
            'partner_name_2' => $data['partner_name_2'] ?? null,
            'relationship_start_date' => $data['relationship_start_date'] ?? null,
            'love_message' => $data['love_message'] ?? null,
            'love_letter' => $data['love_letter'] ?? null,
            'theme' => $data['theme'] ?? null,
            'background_music' => $data['background_music'] ?? null,
            'settings' => $data['settings'] ?? null,
        ], fn($value) => $value !== null);

        return $this->declarationRepository->update($declaration, $updateData);
    }

    /**
     * Publica declaração após verificar pagamento
     */
    public function publish(Declaration $declaration): Declaration
    {
        // Temporariamente desabilitado - não verifica pagamento
        // if (!$this->paymentRepository->userHasValidPayment($declaration->user)) {
        //     throw new \Exception('Pagamento necessário para publicar a declaração.');
        // }

        // Marca como pago e publica (temporariamente sem verificação)
        $declaration = $this->declarationRepository->markAsPaid($declaration);
        $declaration = $this->declarationRepository->publish($declaration);

        // Gera QR Code (temporariamente desabilitado)
        // $this->generateQrCode($declaration);

        return $declaration;
    }

    /**
     * Despublica declaração
     */
    public function unpublish(Declaration $declaration): Declaration
    {
        return $this->declarationRepository->unpublish($declaration);
    }

    /**
     * Alterna privacidade da declaração
     */
    public function togglePrivacy(Declaration $declaration): Declaration
    {
        if (!$declaration->canBePublished()) {
            throw new \Exception('Declaração deve estar paga para ser tornada pública.');
        }

        $newStatus = $declaration->is_public ? false : true;
        
        return $this->declarationRepository->update($declaration, [
            'is_public' => $newStatus
        ]);
    }

    /**
     * Verifica se a declaração pode ser editada
     */
    public function canEdit(Declaration $declaration): bool
    {
        return in_array($declaration->status, ['draft', 'published']);
    }

    /**
     * Verifica se a declaração pode ser visualizada publicamente
     */
    public function canViewPublicly(Declaration $declaration): bool
    {
        return $declaration->is_public && 
               $declaration->is_active && 
               $declaration->has_paid;
    }

    /**
     * Gera QR Code para a declaração
     */
    public function generateQrCode(Declaration $declaration): string
    {
        // Temporariamente desabilitado - instalar dependência endroid/qr-code depois
        return '';
        
        /*
        $url = route('declaration.show', $declaration->slug);
        
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($url)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->build();

        $filename = 'qr-codes/' . $declaration->slug . '-' . Str::random(10) . '.png';
        Storage::put($filename, $result->getString());

        // Atualiza o caminho no banco
        $this->declarationRepository->update($declaration, [
            'qr_code_path' => $filename
        ]);

        return $filename;
        */
    }

    /**
     * Obtém estatísticas da declaração
     */
    public function getStatistics(Declaration $declaration): array
    {
        $timeTogether = $declaration->getTimeTogether();
        
        return [
            'time_together' => $timeTogether,
            'photos_count' => $declaration->photos()->count(),
            'events_count' => $declaration->events()->visible()->count(),
            'is_published' => $declaration->is_public && $declaration->has_paid,
            'creation_date' => $declaration->created_at->format('d/m/Y'),
            'last_update' => $declaration->updated_at->format('d/m/Y H:i'),
        ];
    }

    /**
     * Duplica declaração (para teste ou backup)
     */
    public function duplicate(Declaration $declaration, User $user): Declaration
    {
        $newDeclaration = $this->create($user, [
            'partner_name_1' => $declaration->partner_name_1,
            'partner_name_2' => $declaration->partner_name_2,
            'relationship_start_date' => $declaration->relationship_start_date->format('Y-m-d'),
            'love_message' => $declaration->love_message,
            'love_letter' => $declaration->love_letter,
            'theme' => $declaration->theme,
            'background_music' => $declaration->background_music,
            'settings' => $declaration->settings,
        ]);

        return $newDeclaration;
    }
} 