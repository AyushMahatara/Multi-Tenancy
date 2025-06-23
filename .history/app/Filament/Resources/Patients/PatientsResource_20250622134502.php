<?php

namespace App\Filament\Resources\Patients;

use App\Filament\Resources\Patients\Pages\CreatePatients;
use App\Filament\Resources\Patients\Pages\EditPatients;
use App\Filament\Resources\Patients\Pages\ListPatients;
use App\Filament\Resources\Patients\Pages\ViewPatients;
use App\Filament\Resources\Patients\Schemas\PatientsForm;
use App\Filament\Resources\Patients\Schemas\PatientsInfolist;
use App\Filament\Resources\Patients\Tables\PatientsTable;
use App\Models\Patient;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientsResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PatientsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PatientsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PatientsTable::configure($table);
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
            'index' => ListPatients::route('/'),
            'create' => CreatePatients::route('/create'),
            'view' => ViewPatients::route('/{record}'),
            'edit' => EditPatients::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
