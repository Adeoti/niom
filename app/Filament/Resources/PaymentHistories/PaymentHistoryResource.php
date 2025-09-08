<?php

namespace App\Filament\Resources\PaymentHistories;

use App\Filament\Resources\PaymentHistories\Pages\CreatePaymentHistory;
use App\Filament\Resources\PaymentHistories\Pages\EditPaymentHistory;
use App\Filament\Resources\PaymentHistories\Pages\ListPaymentHistories;
use App\Filament\Resources\PaymentHistories\Pages\ViewPaymentHistory;
use App\Filament\Resources\PaymentHistories\Schemas\PaymentHistoryForm;
use App\Filament\Resources\PaymentHistories\Schemas\PaymentHistoryInfolist;
use App\Filament\Resources\PaymentHistories\Tables\PaymentHistoriesTable;
use App\Models\PaymentHistory;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Auth\Access\Response;
class PaymentHistoryResource extends Resource
{
    protected static ?string $model = PaymentHistory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ReceiptPercent;

    protected static ?string $recordTitleAttribute = 'Payment Records';
    protected static ?int $navigationSort = 2;
    protected static string|UnitEnum|null $navigationGroup = 'Finance';

    // public static function getCreateAuthorizationResponse(): Response
    // {
    //     return Response::deny('Creation disabled for this resource.');
    // }

    public static function form(Schema $schema): Schema
    {
        return PaymentHistoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PaymentHistoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaymentHistoriesTable::configure($table);
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
            'index' => ListPaymentHistories::route('/'),
            'create' => CreatePaymentHistory::route('/create'),
            'view' => ViewPaymentHistory::route('/{record}'),
            'edit' => EditPaymentHistory::route('/{record}/edit'),
        ];
    }
}
