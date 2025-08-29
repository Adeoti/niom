<?php

namespace App\Filament\Resources\ApplicationForms\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApplicationFormForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('institution')
                    ->required(),
                TextInput::make('course')
                    ->required(),
                TextInput::make('level')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                DateTimePicker::make('submitted_at')
                    ->required(),
            ]);
    }
}
