<?php declare(strict_types=1);

namespace Dearvn\FilamentAccessControl\Resources\PermissionResource\Pages;

use Dearvn\FilamentAccessControl\Resources\PermissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['guard_name'] = 'filament';

        return $data;
    }
}
