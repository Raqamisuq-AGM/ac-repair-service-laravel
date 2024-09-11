<?php

namespace App\Filament\Resources\EmailGatewayResource\Pages;

use App\Filament\Resources\EmailGatewayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmailGateway extends EditRecord
{
    protected static string $resource = EmailGatewayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Email Gateway Updated Successfully';
    }
}
