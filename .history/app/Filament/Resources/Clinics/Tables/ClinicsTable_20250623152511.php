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
use Filament\Forms\Components\CheckboxList;

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
                Action::make('Add users')
                    ->icon('heroicon-o-plus')
                    ->form([
                        CheckboxList::make('selectedUsers')
                            ->options(fn() => User::all()->pluck('name', 'id')->toArray())
                    ])
                    ->action(function (Clinic $record, array $data) {
                        $record->users()->syncWithoutDetaching($data['selectedUsers'] ?? []);
                    }),
            ])

            // ->recordActions([
            //     Action::make('Add users')->icon('heroicon-o-plus')
            //         ->form(function () {
            //             return [
            //                 Select::make('selectedUsers')
            //                     ->options(User::pluck('name', 'id')->toArray())
            //                     ->multiple()
            //                     ->preload()
            //                     ->searchable()
            //             ];
            //         })->action(function (Clinic $record, array $data) {
            //             $selectedUsers = $data['selectedUsers'];
            //             $record->users()->syncWithoutDetaching($selectedUsers);
            //         }),
            //     ViewAction::make(),
            //     EditAction::make(),
            // ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
