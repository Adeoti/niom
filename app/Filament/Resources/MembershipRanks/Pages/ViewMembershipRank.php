<?php

namespace App\Filament\Resources\MembershipRanks\Pages;

use App\Filament\Resources\MembershipRanks\MembershipRankResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMembershipRank extends ViewRecord
{
    protected static string $resource = MembershipRankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
