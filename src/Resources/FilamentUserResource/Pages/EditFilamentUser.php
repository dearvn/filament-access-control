<?php declare(strict_types=1);

namespace Dearvn\FilamentAccessControl\Resources\FilamentUserResource\Pages;

use Dearvn\FilamentAccessControl\Resources\FilamentUserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Spatie\Permission\PermissionRegistrar;

class EditFilamentUser extends EditRecord
{
    protected static string $resource = FilamentUserResource::class;

    public function afterSave(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
