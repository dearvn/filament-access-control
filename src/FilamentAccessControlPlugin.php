<?php declare(strict_types=1);

namespace Dearvn\FilamentAccessControl;

use Dearvn\FilamentAccessControl\Enumerators\Feature;
use Dearvn\FilamentAccessControl\Http\Livewire\Login;
use Dearvn\FilamentAccessControl\Http\Middleware\EnsureAccountIsNotExpired;
use Dearvn\FilamentAccessControl\Resources\FilamentUserResource;
use Dearvn\FilamentAccessControl\Resources\PermissionResource;
use Dearvn\FilamentAccessControl\Resources\RoleResource;
use Filament\Contracts\Plugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Panel;

class FilamentAccessControlPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public function getId(): string
    {
        return 'filament-access-control';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->authGuard('filament')
            ->login(Login::class)
            ->authPasswordBroker('filament')
            ->passwordReset()
            ->authMiddleware([
                Authenticate::class,
                ...(Feature::enabled(Feature::ACCOUNT_EXPIRY) ? [EnsureAccountIsNotExpired::class] : []),
            ])
            ->resources([FilamentUserResource::class, PermissionResource::class, RoleResource::class]);
    }

    public function boot(Panel $panel): void {}
}
