<?php

namespace App\Providers;

use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\Repositories\Order\EloquentOrderRepository;
use App\UseCase\Prospecto\Contracts\ConvertToCustomerInterface;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;

use App\UseCase\Prospecto\ConvertToCustomerUseCase;
use App\UseCase\Order\GetOrderUseCase;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $providers = [
        //Repositories
        EloquentOrderRepositoryInterface::class => EloquentOrderRepository::class,

        //UseCase
        GetOrderUseCaseInterface::class => GetOrderUseCase::class,
        ConvertToCustomerInterface::class => ConvertToCustomerUseCase::class,

        ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->providers as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
