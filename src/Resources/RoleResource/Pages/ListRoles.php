<?php

declare(strict_types=1);

namespace Dearvn\FilamentAccessControl\Resources\RoleResource\Pages;

use Dearvn\FilamentAccessControl\Resources\RoleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
