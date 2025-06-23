<?php

namespace App\Filament\Resources\Appointments;

use App\Filament\Resources\Appointments\Pages\CreateAppointments;
use App\Filament\Resources\Appointments\Pages\EditAppointments;
use App\Filament\Resources\Appointments\Pages\ListAppointments;
use App\Filament\Resources\Appointments\Pages\ViewAppointments;
use App\Filament\Resources\Appointments\Schemas\AppointmentsForm;
use App\Filament\Resources\Appointments\Schemas\AppointmentsInfolist;
use App\Filament\Resources\Appointments\Tables\AppointmentsTable;
use App\Models\Appointment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentsResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AppointmentsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AppointmentsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AppointmentsTable::configure($table);
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
            'index' => ListAppointments::route('/'),
            'create' => CreateAppointments::route('/create'),
            'view' => ViewAppointments::route('/{record}'),
            'edit' => EditAppointments::route('/{record}/edit'),
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
