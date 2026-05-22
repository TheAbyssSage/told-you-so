<?php

namespace App\Filament\Resources\Availabilities\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AvailabilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('psychologist_id')
                    ->relationship('psychologist', 'name')
                    ->label('Psychologist')
                    ->searchable()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->rows(3),
                DateTimePicker::make('starts_at')
                    ->required(),
                DateTimePicker::make('ends_at')
                    ->required(),
                TextInput::make('duration_minutes')
                    ->numeric()
                    ->label('Duration (minutes)')
                    ->required(),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('$')
                    ->required(),
                Checkbox::make('is_available')
                    ->label('Available')
                    ->default(true),
            ]);
    }
}
