<?php

namespace App\Filament\Resources\MembershipRanks\Pages;

use App\Filament\Resources\MembershipRanks\MembershipRankResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMembershipRanks extends ListRecords
{
    protected static string $resource = MembershipRankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
