<?php

namespace App\Filament\Resources\EmailManagers\Pages;

use App\Filament\Resources\EmailManagers\EmailManagerResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEmailManager extends EditRecord
{
    protected static string $resource = EmailManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
