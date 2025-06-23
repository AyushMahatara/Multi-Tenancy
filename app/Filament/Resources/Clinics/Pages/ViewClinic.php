<?php

namespace App\Filament\Resources\Clinics\Pages;

use App\Filament\Resources\Clinics\ClinicResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClinic extends ViewRecord
{
    protected static string $resource = ClinicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
