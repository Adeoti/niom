<?php

namespace App\Filament\Resources\EmailManagers\Pages;

use App\Filament\Resources\EmailManagers\EmailManagerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmailManagers extends ListRecords
{
    protected static string $resource = EmailManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
