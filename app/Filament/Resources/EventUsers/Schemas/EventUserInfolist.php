<?php

namespace App\Filament\Resources\EventUsers\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventUserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('event.event_name')
                    ->numeric(),
                TextEntry::make('user.name')
                    ->numeric(),
                IconEntry::make('is_active')
                    ->label('Active Status')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
