<?php

declare(strict_types=1);

namespace Dearvn\FilamentAccessControl\Resources\FilamentUserResource\Pages;

use Dearvn\FilamentAccessControl\Resources\FilamentUserResource;
use Filament\Resources\Pages\ViewRecord;

class ViewFilamentUser extends ViewRecord
{
    protected static string $resource = FilamentUserResource::class;
}
