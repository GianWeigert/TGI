<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class EntityManagerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        
    }

    public function register()
    {
        $this->app->singleton('Doctrine\ORM\EntityManager', function ($app) {
            $paths = [app_path('models')];
            $isDevMode = config('app.debug');
            $dbParams = config('database.doctrine');
            $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
            return EntityManager::create($dbParams, $config);
        });
    }
}