<?php

namespace App\Filament\Resources\MembershipRanks\Pages;

use App\Filament\Resources\MembershipRanks\MembershipRankResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMembershipRank extends EditRecord
{
    protected static string $resource = MembershipRankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
