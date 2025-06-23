<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AppointmentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('patient_id')->relationship('patient')->required(),
                DatePicker
            ]);
    }
}
