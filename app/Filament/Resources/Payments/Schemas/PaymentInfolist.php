<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('label')
                    ->extraAttributes([
                        'style' => 'font-weight: bold;',
                    ])
                    ->label('Label'),
                TextEntry::make('user.name')

                    ->label('Created By'),
                TextEntry::make('amount')
                    ->numeric()
                    ->money('NGN')
                    ->label('Amount'),
                TextEntry::make('type')
                    ->label('Type'),
                TextEntry::make('payment_targets')
                    ->label('Payment Targets'),
                TextEntry::make('is_active')
                    ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive')
                    ->label('Status'),

                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
