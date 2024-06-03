<?php

namespace Tsetis\StandalonePluginTutorial;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StandalonePluginTutorialServiceProvider extends PackageServiceProvider
{
    public static string $name = 'standalone-plugin-tutorial';

    public static string $viewNamespace = 'standalone-plugin-tutorial';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasViews();
    }

    public function packageRegistered(): void
    {
    }
    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            Css::make('heading', __DIR__ . '/../resources/dist/heading.css'),
        );
    }
}
