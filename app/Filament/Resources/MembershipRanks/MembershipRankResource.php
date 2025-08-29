<?php

namespace App\Filament\Resources\MembershipRanks;

use App\Filament\Resources\MembershipRanks\Pages\CreateMembershipRank;
use App\Filament\Resources\MembershipRanks\Pages\EditMembershipRank;
use App\Filament\Resources\MembershipRanks\Pages\ListMembershipRanks;
use App\Filament\Resources\MembershipRanks\Pages\ViewMembershipRank;
use App\Filament\Resources\MembershipRanks\Schemas\MembershipRankForm;
use App\Filament\Resources\MembershipRanks\Schemas\MembershipRankInfolist;
use App\Filament\Resources\MembershipRanks\Tables\MembershipRanksTable;
use App\Models\MembershipRank;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MembershipRankResource extends Resource
{
    protected static ?string $model = MembershipRank::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Star;

    protected static ?string $recordTitleAttribute = 'Membership Rank';
    protected static string|UnitEnum|null $navigationGroup = 'HRM';
    
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return MembershipRankForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MembershipRankInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MembershipRanksTable::configure($table);
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
            'index' => ListMembershipRanks::route('/'),
            'create' => CreateMembershipRank::route('/create'),
            'view' => ViewMembershipRank::route('/{record}'),
            'edit' => EditMembershipRank::route('/{record}/edit'),
        ];
    }
}
