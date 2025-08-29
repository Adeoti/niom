<?php

namespace App\Filament\Resources\Memberships\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MembershipInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('title'),
                TextEntry::make('surname'),
                TextEntry::make('first_name'),
                TextEntry::make('middle_name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('nationality'),
                TextEntry::make('phone'),
                TextEntry::make('passport_path'),
                TextEntry::make('type'),
                TextEntry::make('status'),
                TextEntry::make('application_date')
                    ->dateTime(),
                TextEntry::make('approval_date')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                IconEntry::make('featured_on_homepage')
                    ->boolean(),
            ]);
    }
}
