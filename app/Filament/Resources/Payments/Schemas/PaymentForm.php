<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\ToggleButtons;

class PaymentForm
{

    
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('')
                    ->columns(2)
                    ->schema([

                        TextInput::make('label')
                            ->required(),
                        Hidden::make('user_id')
                            ->required()
                            ->default(Auth::id()),
                        TextInput::make('amount')
                            ->required()
                            ->numeric(),
                        Select::make('type')
                            ->required()
                            ->options([
                                'application_fee' => 'Application Fee',
                                'conference' => 'Conference Fee',
                                'annual_due' => 'Annual Due',
                                'induction_fee' => 'Induction Fee',
                                'upgrading_fee' => 'Upgrading Fee'
                            ]),
                        Select::make('payment_targets')
                            ->required()
                            ->options([
                                'all' => 'All Members',
                                'new_members' => 'New Members',
                                // 'students' => 'Students',
                                // 'corporate' => 'Corporate Members',
                                // 'fellow' => 'Fellows',
                                // 'associate' => 'Associates',
                                // 'affiliate' => 'Affiliates',
                            ])
                            ->default('all'),

                        DatePicker::make('due_date')
                            ->label('Due Date')
                            ->required()
                            ->placeholder('Select due date')
                            ->format('Y-m-d')
                            ->displayFormat('F j, Y')
                            ->minDate(now()->addDay()),
                        ToggleButtons::make('is_active')

                            ->label('Status')
                            ->inline()
                            ->options([
                                1 => 'Active',
                                0 => 'Inactive',
                            ])
                            ->colors([
                                1 => 'success',
                                0 => 'danger',
                            ])
                            ->default('1')
                            ->required(),

                    ])
            ]);
    }
}
