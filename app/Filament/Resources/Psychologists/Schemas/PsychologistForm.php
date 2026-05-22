<?php

namespace App\Filament\Resources\Psychologists\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PsychologistForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('specialty')
                    ->required(),
                Textarea::make('bio')
                    ->rows(3),
                Checkbox::make('active')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
