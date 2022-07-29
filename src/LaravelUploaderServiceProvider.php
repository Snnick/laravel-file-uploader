<?php

namespace Snnick\LaravelFileUploader;

use Illuminate\Support\ServiceProvider;
use Snnick\LaravelFileUploader\Contracts\FileContract;
use Snnick\LaravelFileUploader\Services\FileService;

class LaravelUploaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole() && function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/Config/file-uploader.php' => config_path('file-uploader.php'),
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(FileContract::class, FileService::class);
        $this->mergeConfigFrom(__DIR__.'/Config/file-uploader.php', 'file-uploader');
    }
}
