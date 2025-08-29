<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Hidden::make('user_id')
                            ->required()
                            ->default(Auth::id()),
                        TextInput::make('event_name')
                            ->required(),

                        DateTimePicker::make('event_date')
                            ->required(),
                        Textarea::make('event_description')
                            ->default(null)
                            ->columnSpanFull(),
                        ToggleButtons::make('is_active')
                            ->label('Active Status')
                            ->inline()
                            ->colors([
                                1 => 'success',
                                0 => 'danger',
                            ])
                            ->default(1)
                            ->options([
                                1 => 'Active',
                                0 => 'Inactive',
                            ])
                            ->required(),

                    ])
            ]);
    }
}
