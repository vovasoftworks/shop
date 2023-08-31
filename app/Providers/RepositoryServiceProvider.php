<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Write\User\UserWriteRepository;
use App\Repositories\Read\Product\ProductReadRepository;
use App\Repositories\Write\Product\ProductWriteRepository;
use App\Repositories\Write\Category\CategoryWriteRepository;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;
use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class,
        );

        $this->app->bind(
            ProductWriteRepositoryInterface::class,
            ProductWriteRepository::class,
        );

        $this->app->bind(
            ProductReadRepositoryInterface::class,
            ProductReadRepository::class,
        );

        $this->app->bind(
            CategoryWriteRepositoryInterface::class,
            CategoryWriteRepository::class,
        );
    }

}
