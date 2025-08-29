<?php

namespace App\Filament\Resources\Memberships\Schemas;

use App\Models\User;
use Filament\Schemas\Schema;
use App\Models\MembershipRank;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;

class MembershipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)

            ->components([

                Section::make('Membership Information')->schema([


                    Select::make('user_id')
                        ->required()
                        ->label('Applicant')
                        ->options(fn() => User::all()->pluck('name', 'id')),
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('surname')
                        ->required(),
                    TextInput::make('first_name')
                        ->required(),
                    TextInput::make('middle_name')
                        ->default(null),
                    DatePicker::make('date_of_birth'),
                    TextInput::make('nationality')
                        ->required(),
                    TextInput::make('phone')
                        // ->tel()
                        ->required(),
                    Select::make('type')

                        ->options([
                            'student-hnd' => 'OTM Student (HND)',
                            'university-student' => 'University Student (300 Level+)',
                            'polytechnic-lecturer' => 'Polytechnic Lecturer',
                            'university-lecturer' => 'University Lecturer',
                            'professional' => 'Professional',
                        ])
                        ->required(),
                    TextInput::make('institution')
                        ->required(),
                    TextInput::make('qualification')
                        ->required(),
                    Select::make('membership_rank_id')
                        ->required()
                        ->searchable()
                        ->label('Membership Rank')
                        ->options(fn() => MembershipRank::all()->pluck('name', 'id')),
                    Textarea::make('address')
                        ->required()
                        ->columnSpanFull(),
                    FileUpload::make('passport_path')
                        ->columnSpanFull()
                        ->image()
                        ->disk('public')
                        ->default(null),
                    RichEditor::make('biography')
                        ->extraAttributes(['style' => 'min-height: 400px'])
                        ->columnSpanFull(),

                    Hidden::make('status')
                        ->default('pending')
                        ->visibleOn('create')
                        ->required(),

                    // Only available on create and not on edit
                    Hidden::make('application_date')
                        ->default(now())
                        ->visibleOn('create')
                        ->required(),
                    // DateTimePicker::make('approval_date'),
                    // Toggle::make('featured_on_homepage')
                    //     ->required(),
                ])->columns(3),
            ]);
    }
}
