<?php

declare(strict_types=1);

namespace Dearvn\FilamentAccessControl\Resources\FilamentUserResource\Pages;

use Dearvn\FilamentAccessControl\Resources\FilamentUserResource;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;

class ListFilamentUsers extends ListRecords
{
    protected static string $resource = FilamentUserResource::class;

    public function extendUsers(Collection $users): void
    {
        $users->each->extend();

        Notification::make()->title(
            __('filament-access-control::default.messages.accounts_extended'),
        )->success()->send();
    }

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
