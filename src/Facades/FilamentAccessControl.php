<?php

namespace Dearvn\FilamentAccessControl\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dearvn\FilamentAccessControl\FilamentAccessControl
 */
class FilamentAccessControl extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Dearvn\FilamentAccessControl\FilamentAccessControl::class;
    }
}
