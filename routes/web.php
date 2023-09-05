<?php

use Dearvn\FilamentAccessControl\Http\Livewire\AccountExpired;
use Dearvn\FilamentAccessControl\Http\Livewire\TwoFactorChallenge;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::name('filament.')->group(function () {
    foreach (Filament::getPanels() as $panel) {
        $domains = $panel->getDomains();

        foreach ((empty($domains) ? [null] : $domains) as $domain) {
            Route::domain($domain)
                ->middleware($panel->getMiddleware())
                ->name($panel->getId() . '.')
                ->prefix($panel->getPath())
                ->group(function () {
                    Route::get('/auth/expired', AccountExpired::class)->name('account.expired');
                    Route::get('/auth/two-factor', TwoFactorChallenge::class)->name('account.two-factor');
                });
        }
    }
});
