<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Select::make('client_id')
                    ->relationship('client', 'name')
                    ->label('Client')
                    ->searchable()
                    ->nullable(),
                Checkbox::make('is_admin')
                    ->label('Administrator'),
                Checkbox::make('has_adhd')
                    ->label('ADHD'),
                Checkbox::make('has_autism')
                    ->label('Autism'),
                Checkbox::make('has_anxiety')
                    ->label('Anxiety'),
                Textarea::make('medication')
                    ->rows(3),
                Checkbox::make('in_treatment')
                    ->label('In treatment'),
                TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->dehydrateStateUsing(fn (?string $state): ?string => $state ? Hash::make($state) : null)
                    ->required(fn (?string $context): bool => $context === 'create'),
                DateTimePicker::make('email_verified_at')
                    ->label('Email verified at'),
            ]);
    }
}
