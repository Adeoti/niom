<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('subject'),

                TextEntry::make('created_at')
                    ->label('Sent On')
                    ->dateTime(),
                TextEntry::make('message')
                    ->columnSpanFull(),
            ]);
    }
}
