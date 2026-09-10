<?php

namespace App\Filament\Resources\Journals\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JournalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Journal Information')
                    ->description('Provide the publication details for this journal.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Journal Name')
                            ->placeholder('e.g. NIOTIM Journal of Office Technology and Information Management')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Grid::make(3)
                            ->schema([
                                TextInput::make('year')
                                    ->label('Publication Year')
                                    ->numeric()
                                    ->minValue(1900)
                                    ->maxValue(2100)
                                    ->required(),

                                TextInput::make('volume')
                                    ->label('Volume')
                                    ->placeholder('e.g. 12')
                                    ->maxLength(50),

                                TextInput::make('issue')
                                    ->label('Issue')
                                    ->placeholder('e.g. 2')
                                    ->maxLength(50),
                            ]),

                        RichEditor::make('description')
                            ->label('Description')
                            ->placeholder('Provide a brief description of this journal...')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Publication Files')
                    ->description('Upload the journal cover and the publication PDF.')
                    ->schema([
                        FileUpload::make('cover_image')
                            ->label('Cover Image')
                            ->image()
                            ->disk('public')
                            ->directory('journals/covers')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->helperText('Recommended: portrait-oriented JPG or PNG. Maximum 5MB.'),

                        FileUpload::make('pdf_path')
                            ->label('Journal PDF')
                            ->acceptedFileTypes(['application/pdf'])
                            ->disk('public')
                            ->directory('journals/pdfs')
                            ->maxSize(307200)
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->helperText('PDF only. Maximum 300MB.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Publication Settings')
                    ->description('Control when and where this journal appears publicly.')
                    ->schema([
                        Select::make('is_published')
                            ->label('Publication Status')
                            ->options([
                                true => 'Published',
                                false => 'Draft',
                            ])
                            ->default(true)
                            ->required(),

                        DateTimePicker::make('published_at')
                            ->label('Publication Date')
                            ->seconds(false)
                            ->default(now()),

                        TextInput::make('sort_order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Lower numbers appear first.'),
                    ])
                    ->columns(3),
            ]);
    }
}
