<?php

declare(strict_types=1);

namespace Dearvn\FilamentAccessControl\Resources\PermissionResource\Pages;

use Dearvn\FilamentAccessControl\Resources\PermissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
