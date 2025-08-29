<?php

namespace App\Filament\Resources\EmailManagers\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class EmailManagerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('')
                    ->columns(2)
                    ->schema([
                        Hidden::make('user_id')
                            ->required()
                            ->default(Auth::id()),
                        TextInput::make('name')
                            ->required(),
                        Select::make('type')
                            ->options([
                                'welcome_email' => 'Welcome Email',
                                'payment_success' => 'Payment Success',
                                'announcement' => 'Announcement',
                                'approval' => 'Approval Email',
                            ])
                            ->required(),
                        TextInput::make('subject')
                            ->default(null)
                            ->columnSpanFull(),
                        RichEditor::make('body')
                            ->extraAttributes(['style' => 'min-height: 400px'])
                            ->columnSpanFull()
                            ->default(null)
                            ->columnSpanFull(),
                    ])
            ]);
    }
}
