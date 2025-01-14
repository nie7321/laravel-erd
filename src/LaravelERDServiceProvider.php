<?php

namespace Kevincobain2000\LaravelERD;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Kevincobain2000\LaravelERD\Commands\LaravelERDCommand;
use Route;

class LaravelERDServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-erd')
            ->hasConfigFile('laravel-erd')
            ->hasViews()
            ->hasCommand(LaravelERDCommand::class);

        Route::get(config('laravel-erd.url'), [\Kevincobain2000\LaravelERD\Controllers\LaravelERDController::class, 'index'])
            ->name('laravel-erd.index')
            ->middleware(config('laravel-erd.middlewares'));
    }
}
