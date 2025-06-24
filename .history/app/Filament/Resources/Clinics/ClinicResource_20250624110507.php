<?php

namespace App\Filament\Resources\Clinics;

use App\Filament\Resources\Clinics\Pages\CreateClinic;
use App\Filament\Resources\Clinics\Pages\EditClinic;
use App\Filament\Resources\Clinics\Pages\ListClinics;
use App\Filament\Resources\Clinics\Pages\ViewClinic;
use App\Filament\Resources\Clinics\Schemas\ClinicForm;
use App\Filament\Resources\Clinics\Schemas\ClinicInfolist;
use App\Filament\Resources\Clinics\Tables\ClinicsTable;
use App\Models\Clinic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClinicResource extends Resource
{
    protected static ?string $model = Clinic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $isScopedToTenant = false;

    public static function canAccess(): bool {}

    public static function form(Schema $schema): Schema
    {
        return ClinicForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClinicInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClinicsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClinics::route('/'),
            // 'create' => CreateClinic::route('/create'),
            'view' => ViewClinic::route('/{record}'),
            // 'edit' => EditClinic::route('/{record}/edit'),
        ];
    }
}
