<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('title')
                            ->columnSpanFull()
                            ->required(),
                        // TextInput::make('slug')
                        //     ->required(),
                        Textarea::make('excerpt')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->extraAttributes(['style' => 'min-height: 400px'])
                            ->columnSpanFull()

                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpan(2),
                Section::make('Meta Data')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->image()
                            ->disk('public')
                            ->directory('featured_images')
                            ->visibility('public')
                            ->required(),
                        DatePicker::make('publish_date')
                            ->required(),
                        ToggleButtons::make('is_published')
                            ->options([
                                1 => 'Yes',
                                0 => 'No',
                            ])
                            ->inline()
                            ->colors([
                                1 => 'success',
                                0 => 'danger',
                            ])
                            ->default(0)
                            ->label('Publish News?'),
                        Hidden::make('author_id')
                            ->default(Auth::id()),
                    ])->columnSpan(1)
            ]);
    }
}
