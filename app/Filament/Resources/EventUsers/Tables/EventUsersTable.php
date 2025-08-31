<?php

namespace App\Filament\Resources\EventUsers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventUsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event.event_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('is_active')
                    ->badge()
                    ->colors([
                        0 => 'danger',
                        1 => 'success',
                    ])
                    ->state(fn($record) => $record->is_active ? 'registered' : 'inactive'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
