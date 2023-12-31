<?php

declare(strict_types=1);

namespace Dearvn\FilamentAccessControl;

use Dearvn\FilamentAccessControl\Commands\CreateFilamentUser;
use Dearvn\FilamentAccessControl\Commands\Install;
use Dearvn\FilamentAccessControl\Http\Livewire\AccountExpired;
use Dearvn\FilamentAccessControl\Http\Livewire\Login;
use Dearvn\FilamentAccessControl\Http\Livewire\TwoFactorChallenge;
use Dearvn\FilamentAccessControl\Models\FilamentUser;
use Dearvn\FilamentAccessControl\Policies\FilamentUserPolicy;
use Dearvn\FilamentAccessControl\Policies\PermissionPolicy;
use Dearvn\FilamentAccessControl\Policies\RolePolicy;
use Dearvn\FilamentAccessControl\Resources\FilamentUserResource;
use Dearvn\FilamentAccessControl\Resources\PermissionResource;
use Dearvn\FilamentAccessControl\Resources\RoleResource;
use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use Livewire\Mechanisms\ComponentRegistry;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FilamentAccessControlServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-access-control')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasRoutes('web')
            ->hasMigration('create_filament_users_table')
            ->hasMigration('create_filament_password_resets_table')
            ->hasViews('filament-access-control')
            ->hasCommand(CreateFilamentUser::class)
            ->hasCommand(Install::class);
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();
        $this->mergeGuardsConfig();
        $this->mergeProvidersConfig();
        $this->mergePasswordsConfig();
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        $this->registerComponent(Login::class);
        $this->registerComponent(AccountExpired::class);
        $this->registerComponent(TwoFactorChallenge::class);
        Gate::policy(config('filament-access-control.user_model'), FilamentUserPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
    }

    protected function getResources(): array
    {
        return [FilamentUserResource::class, PermissionResource::class, RoleResource::class];
    }

    /**
     * Merge auth guards configuration.
     */
    protected function mergeGuardsConfig(): void
    {
        $this->mergeConfig([
            'filament' => [
                'driver' => 'session',
                'provider' => 'filament_users',
            ],
        ], 'auth.guards');
    }

    /**
     * Merge auth providers configuration.
     */
    protected function mergeProvidersConfig(): void
    {
        $this->mergeConfig([
            'filament_users' => [
                'driver' => 'eloquent',
                'model' => $this->app['config']->get('filament-access-control.user_model', FilamentUser::class),
            ],
        ], 'auth.providers');
    }

    /**
     * Merge passwords configuration.
     */
    protected function mergePasswordsConfig(): void
    {
        $this->mergeConfig([
            'filament' => [
                'provider' => 'filament_users',
                'email' => 'auth.emails.password',
                'table' => 'filament_password_resets',
                'expire' => 60,
            ],
        ], 'auth.passwords');
    }

    /**
     * Merge config from array.
     */
    protected function mergeConfig(array $config, string $key): void
    {
        $default = $this->app['config']->get($key, []);
        $this->app['config']->set($key, array_merge($config, $default));
    }

    protected function registerComponent(string $component): void
    {
        $name = app(ComponentRegistry::class)->getName($component);
        Livewire::component($name, $component);
    }
}
