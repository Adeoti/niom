<?php

namespace App\Filament\Resources\Memberships\Tables;

use App\Models\Membership;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Mail\MembershipApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class MembershipsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('surname')
                    ->searchable(),
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('middle_name')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                TextColumn::make('nationality')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                // TextColumn::make('passport_path')
                //     ->searchable(),
                ImageColumn::make('passport_path')
                    ->disk('public')
                    ->label('Passport')

                    ->width(100)
                    ->height(100),
                TextColumn::make('type')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'approved',
                        'warning' => 'pending',
                        'danger' => 'rejected',
                    ])
                    ->searchable(),
                TextColumn::make('application_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('approval_date')
                    ->dateTime()
                    ->placeholder('Not yet approved')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ToggleColumn::make('featured_on_homepage'),
                ToggleColumn::make('is_exco'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    Action::make('Approve')
                        ->visible(function (Membership $record) {
                            return $record->status === 'pending';
                        })
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function (Membership $record) {
                            $record->update([
                                'status' => 'approved',
                                'approval_date' => now()
                            ]);

                            // Send approval email to the user
                            try {
                                // Get the user associated with this membership
                                $user = $record->user;

                                if ($user && $user->email) {
                                    Mail::to($user->email)->send(new MembershipApproved($record));
                                }
                            } catch (\Exception $e) {
                                // Log error if email fails but don't break the approval process
                                Log::error('Failed to send approval email: ' . $e->getMessage());
                            }
                        }),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
