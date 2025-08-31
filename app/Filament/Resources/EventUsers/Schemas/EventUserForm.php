<?php

namespace App\Filament\Resources\EventUsers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('event_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
