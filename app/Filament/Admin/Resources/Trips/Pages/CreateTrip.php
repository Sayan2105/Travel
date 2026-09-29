<?php

namespace App\Filament\Admin\Resources\Trips\Pages;

use App\Filament\Admin\Resources\Trips\TripResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateTrip extends CreateRecord
{
    protected static string $resource = TripResource::class;

    // #[Override]
    protected function getRedirectUrl(): string
    {
        return TripResource::getUrl('index');
    }
}
