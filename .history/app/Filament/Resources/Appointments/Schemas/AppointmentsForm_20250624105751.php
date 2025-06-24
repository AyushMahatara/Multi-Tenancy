<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class AppointmentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('patient_id')->relationship('patient', 'name')->required(),
                DatePicker::make('appointment_date')->required(),
                TimePicker::make('appointment_time')->required(),
                TextInput::make('appointment_number')->required(),
                Hidden::make('user_id')->default(fn() => auth()->user()->id),
            ]);
    }
}
