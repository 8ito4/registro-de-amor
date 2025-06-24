<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class PaymentRepository
{
    public function __construct(
        protected Payment $model
    ) {}

    /**
     * Encontra pagamento por ID
     */
    public function findById(int $id): ?Payment
    {
        return $this->model->find($id);
    }

    /**
     * Encontra pagamento por Stripe Payment Intent ID
     */
    public function findByStripePaymentIntentId(string $paymentIntentId): ?Payment
    {
        return $this->model->where('stripe_payment_intent_id', $paymentIntentId)->first();
    }

    /**
     * Lista pagamentos do usuário
     */
    public function getByUser(User $user): Collection
    {
        return $this->model->where('user_id', $user->id)
                          ->orderBy('created_at', 'desc')
                          ->get();
    }

    /**
     * Lista pagamentos completados do usuário
     */
    public function getCompletedByUser(User $user): Collection
    {
        return $this->model->where('user_id', $user->id)
                          ->completed()
                          ->orderBy('paid_at', 'desc')
                          ->get();
    }

    /**
     * Cria novo pagamento
     */
    public function create(array $data): Payment
    {
        return $this->model->create($data);
    }

    /**
     * Atualiza pagamento
     */
    public function update(Payment $payment, array $data): Payment
    {
        $payment->update($data);
        return $payment->fresh();
    }

    /**
     * Marca pagamento como completado
     */
    public function markAsCompleted(Payment $payment): Payment
    {
        $payment->update([
            'status' => 'completed',
            'paid_at' => now()
        ]);
        
        return $payment->fresh();
    }

    /**
     * Marca pagamento como falhado
     */
    public function markAsFailed(Payment $payment): Payment
    {
        $payment->update(['status' => 'failed']);
        return $payment->fresh();
    }

    /**
     * Verifica se usuário tem pagamento válido
     */
    public function userHasValidPayment(User $user): bool
    {
        return $this->model->where('user_id', $user->id)
                          ->completed()
                          ->exists();
    }

    /**
     * Obtém último pagamento válido do usuário
     */
    public function getLastValidPayment(User $user): ?Payment
    {
        return $this->model->where('user_id', $user->id)
                          ->completed()
                          ->latest('paid_at')
                          ->first();
    }
} 