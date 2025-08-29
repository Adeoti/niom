<?php

namespace App\Filament\Resources\EmailManagers\Schemas;

use Faker\Provider\Lorem;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EmailManagerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('Created By'),
                TextEntry::make('name'),
                TextEntry::make('type'),
                TextEntry::make('subject'),
                TextEntry::make('body')
                    ->html()
                    ->columnSpanFull(),

                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
