<?php

namespace App\Filament\Resources\PaymentHistories\Schemas;

use App\Models\Payment;
use App\Models\Membership;
use Dom\Text;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;

class PaymentHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('membership_id')
                    ->required()
                    ->label('Member')
                    // Combine first_name and last_name in the options
                    ->options(Membership::with('user')->get()->mapWithKeys(function ($membership) {
                        return [$membership->id => $membership->user->name];
                    })->toArray())
                    ->searchable(),
                Select::make('payment_id')
                    ->required()
                    ->label('Payment')
                    ->options(Payment::all()->pluck('label', 'id'))
                    ->searchable(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Select::make('payment_method')
                    ->required()
                    ->options([
                        'credit_card' => 'Credit Card',
                        'paystack' => 'Paystack',
                        'bank_transfer' => 'Bank Transfer',
                    ]),
                TextInput::make('transaction_reference')
                    ->label('Transaction Ref')
                    ->required()
                    ->unique(ignoreRecord: true),

                Hidden::make('api_response')
                    ->default('This was a manual entry by the admin ' . Auth::user()->name)
                    ->columnSpanFull(),
                Hidden::make('status')
                    ->default('completed')
                    ->required(),
            ]);
    }
}
