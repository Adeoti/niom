<?php

namespace App\Filament\Resources\PaymentHistories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentHistoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('membership.user.name')
                    ->label('Member'),
                TextEntry::make('payment.label')
                    ->label('Payment'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('payment_method'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),

                TextEntry::make('api_response')
                    ->label('API Response')
                    ->formatStateUsing(fn($state) => json_encode(json_decode($state), JSON_PRETTY_PRINT))
                    ->wrap(),
            ]);
    }
}
