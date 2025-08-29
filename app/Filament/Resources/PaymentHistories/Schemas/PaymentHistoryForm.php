<?php

namespace App\Filament\Resources\PaymentHistories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('membership_id')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_id')
                    ->required()
                    ->numeric(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_method')
                    ->required(),
                Textarea::make('api_response')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
