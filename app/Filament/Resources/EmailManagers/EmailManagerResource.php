<?php

namespace App\Filament\Resources\EmailManagers;

use App\Filament\Resources\EmailManagers\Pages\CreateEmailManager;
use App\Filament\Resources\EmailManagers\Pages\EditEmailManager;
use App\Filament\Resources\EmailManagers\Pages\ListEmailManagers;
use App\Filament\Resources\EmailManagers\Pages\ViewEmailManager;
use App\Filament\Resources\EmailManagers\Schemas\EmailManagerForm;
use App\Filament\Resources\EmailManagers\Schemas\EmailManagerInfolist;
use App\Filament\Resources\EmailManagers\Tables\EmailManagersTable;
use App\Models\EmailManager;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EmailManagerResource extends Resource
{
    protected static ?string $model = EmailManager::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChatBubbleBottomCenter;

    protected static ?string $recordTitleAttribute = 'Email Manager';
    protected static string|UnitEnum|null $navigationGroup = 'Communication';
    protected static ?string $navigationLabel = 'Email Manager ';

    public static function form(Schema $schema): Schema
    {
        return EmailManagerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EmailManagerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmailManagersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmailManagers::route('/'),
            'create' => CreateEmailManager::route('/create'),
            'view' => ViewEmailManager::route('/{record}'),
            'edit' => EditEmailManager::route('/{record}/edit'),
        ];
    }
}
