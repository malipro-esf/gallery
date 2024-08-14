<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        //set public_html as public folder to deployment on cpanel
//        $this->app->bind('path.public', function() {
//            return realpath(base_path().'/../public_html');
//        });

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

        $this->app->bind(
            'App\Repositories\ContactRepositoryInterface',
            'App\Repositories\ContactRepository'
        );

        $this->app->bind(
            'App\Repositories\SettingsRepositoryInterface',
            'App\Repositories\SettingsRepository'
        );

        $this->app->bind(
            'App\Repositories\BlogRepositoryInterface',
            'App\Repositories\BlogRepository'
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
