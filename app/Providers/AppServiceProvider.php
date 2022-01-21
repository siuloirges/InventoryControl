<?php

namespace App\Providers;

use App\Repositories\Asesor\CalculateCommission\CalculateCommissionRepository;
use App\Repositories\Asesor\CalculateCommission\Contracts\CalculateCommissionInterface;
use App\Repositories\OnlinePaymentStatus\Contracts\OnlinePaymentStatusInterface;
use App\Repositories\OnlinePaymentStatus\OnlinePaymentStatusRepository;
use App\Repositories\Order\CheckEpycoStatus\CheckEpycoStatusRepository;
use App\Repositories\Order\CheckEpycoStatus\Contracts\CheckEpycoStatusRepositoryInterface;
use App\Repositories\Order\InventoryExtractionCenter\contracts\InventoryExtractionCenterInterface;
use App\Repositories\Order\InventoryExtractionCenter\InventoryExtractionCenterRepository;
use App\Repositories\PaymentReports\Contracts\PaymentReportsInterface;
use App\Repositories\PaymentReports\PaymentReportsRepository;
use App\Repositories\stock\updateStockMongo\Contracts\UpdateStockMongoInterface;
use App\Repositories\stock\updateStockMongo\UpdateStockMongoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CheckEpycoStatusRepositoryInterface::class,CheckEpycoStatusRepository::class);
        $this->app->bind(OnlinePaymentStatusInterface::class,OnlinePaymentStatusRepository::class);
        $this->app->bind(UpdateStockMongoInterface::class,UpdateStockMongoRepository::class);
        $this->app->bind(CalculateCommissionInterface::class,CalculateCommissionRepository::class);
        $this->app->bind(PaymentReportsInterface::class,PaymentReportsRepository::class);
        $this->app->bind(InventoryExtractionCenterInterface::class,InventoryExtractionCenterRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
