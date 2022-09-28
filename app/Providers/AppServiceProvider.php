<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        $this->app->bind(
            'App\Repositories\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
        );

        $this->app->bind(
            'App\Repositories\AttributeRepositoryInterface',
            'App\Repositories\AttributeRepository'
        );

        $this->app->bind(
            'App\Repositories\AttributeValueRepositoryInterface',
            'App\Repositories\AttributeValueRepository'
        );

        $this->app->bind(
            'App\Repositories\TagRepositoryInterface',
            'App\Repositories\TagRepository'
        );

        $this->app->bind(
            'App\Repositories\CommentRepositoryInterface',
            'App\Repositories\CommentRepository'
        );

        $this->app->bind(
            'App\Repositories\ArtworkRepositoryInterface',
            'App\Repositories\ArtworkRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

    }
}
