<?php

namespace App\Filament\Resources\MembershipRanks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MembershipRankForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('level')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
