<?php

namespace App\Filament\Resources\Users\Pages;

use App\Models\User;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Users\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                // only visible if the user is not admin
                ->visible(fn(User $record): bool => !$record->is_admin),
        ];
    }
}
