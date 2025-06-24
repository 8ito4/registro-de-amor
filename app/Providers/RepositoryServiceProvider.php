<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Repositories
use App\Repositories\DeclarationRepository;
use App\Repositories\PhotoRepository;
use App\Repositories\EventRepository;
use App\Repositories\PaymentRepository;

// Services
use App\Services\DeclarationService;
use App\Services\PhotoService;
use App\Services\PaymentService;

// Models
use App\Models\Declaration;
use App\Models\Photo;
use App\Models\Event;
use App\Models\Payment;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Registra Repositories
        $this->app->bind(DeclarationRepository::class, function ($app) {
            return new DeclarationRepository(new Declaration());
        });

        $this->app->bind(PhotoRepository::class, function ($app) {
            return new PhotoRepository(new Photo());
        });

        $this->app->bind(EventRepository::class, function ($app) {
            return new EventRepository(new Event());
        });

        $this->app->bind(PaymentRepository::class, function ($app) {
            return new PaymentRepository(new Payment());
        });

        // Registra Services
        $this->app->bind(DeclarationService::class, function ($app) {
            return new DeclarationService(
                $app->make(DeclarationRepository::class),
                $app->make(PaymentRepository::class)
            );
        });

        $this->app->bind(PhotoService::class, function ($app) {
            return new PhotoService(
                $app->make(PhotoRepository::class)
            );
        });

        $this->app->bind(PaymentService::class, function ($app) {
            return new PaymentService(
                $app->make(PaymentRepository::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
