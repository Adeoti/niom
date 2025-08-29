<?php

namespace App\Filament\Resources\EmailManagers\Pages;

use App\Filament\Resources\EmailManagers\EmailManagerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEmailManager extends ViewRecord
{
    protected static string $resource = EmailManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
