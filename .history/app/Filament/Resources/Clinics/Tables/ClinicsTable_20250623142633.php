<?php

namespace App\Filament\Resources\Clinics\Tables;

use App\Models\User;
use App\Models\Clinic;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class ClinicsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('Add users')->icon('heroicon-o-plus')
                    ->form(fn (Clinic $record) => [
    Select::make('selectedUsers')
        ->label('Select Users')
        ->options(fn () => \App\Models\User::whereDoesntHave('clinics', fn ($q) => $q->where('clinics.id', $record->id))->pluck('name', 'id'))
        ->multiple()
        ->preload()
        ->searchable(),
])
                    })->action(function (Clinic $record, array $data) {
                        $selectedUsers = $data['selectedUsers'];
                        $record->users()->syncWithoutDetaching($selectedUsers);
                    }),
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
