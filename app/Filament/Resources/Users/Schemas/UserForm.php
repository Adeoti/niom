<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;

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
                // DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->required(),
                ToggleButtons::make('is_admin')
                    ->label('Is Admin?')
                    ->inline()
                    ->options([
                        1 => 'Yes',
                        0 => 'No',
                    ])
                    ->default(0),
                // ToggleButtons::make('is_super_admin')
                //     ->label('Is Super Admin')
                //     ->options([
                //         1 => 'Yes',
                //         0 => 'No',
                //     ])
                //     ->default(0)
                //     ->required(),
            ]);
    }
}
