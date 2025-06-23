<?php

namespace App\Filament\Resources\Patients\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class PatientsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextColumn::make('clinic.name')->searchable()->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('phone')->searchable()->sortable(),
            ]);
    }
}
