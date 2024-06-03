<?php

namespace Tsetis\StandalonePluginTutorial;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tsetis\StandalonePluginTutorial\Commands\StandalonePluginTutorialCommand;
use Tsetis\StandalonePluginTutorial\Testing\TestsStandalonePluginTutorial;

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
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('tsetis/standalone-plugin-tutorial');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/standalone-plugin-tutorial/{$file->getFilename()}"),
                ], 'standalone-plugin-tutorial-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsStandalonePluginTutorial());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'tsetis/standalone-plugin-tutorial';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('standalone-plugin-tutorial', __DIR__ . '/../resources/dist/components/standalone-plugin-tutorial.js'),
            Css::make('standalone-plugin-tutorial-styles', __DIR__ . '/../resources/dist/standalone-plugin-tutorial.css'),
            Js::make('standalone-plugin-tutorial-scripts', __DIR__ . '/../resources/dist/standalone-plugin-tutorial.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            StandalonePluginTutorialCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_standalone-plugin-tutorial_table',
        ];
    }
}
