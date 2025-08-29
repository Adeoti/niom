<?php

namespace App\Filament\Resources\Replies;

use App\Filament\Resources\Replies\Pages\CreateReply;
use App\Filament\Resources\Replies\Pages\EditReply;
use App\Filament\Resources\Replies\Pages\ListReplies;
use App\Filament\Resources\Replies\Pages\ViewReply;
use App\Filament\Resources\Replies\Schemas\ReplyForm;
use App\Filament\Resources\Replies\Schemas\ReplyInfolist;
use App\Filament\Resources\Replies\Tables\RepliesTable;
use App\Models\Reply;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReplyResource extends Resource
{
    protected static ?string $model = Reply::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Replies';
    protected static bool $isDiscovered = false;

    public static function form(Schema $schema): Schema
    {
        return ReplyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReplyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RepliesTable::configure($table);
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
            'index' => ListReplies::route('/'),
            'create' => CreateReply::route('/create'),
            'view' => ViewReply::route('/{record}'),
            'edit' => EditReply::route('/{record}/edit'),
        ];
    }
}
