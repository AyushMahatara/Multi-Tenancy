<?php

namespace App\Filament\Resources\Clinics\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

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
                Action::make('Add users')->icon('heroicon-o-plus')->form(function () {
                    return [
                        Select::make('selectedUsers')
                            // ->relationship('users', 'name')
                            ->options(User::pluck('name', 'id'))
                            ->multiple()
                            ->preload()
                            ->searchable()
                    ];
                })->action(function ($record, array $data) {
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
