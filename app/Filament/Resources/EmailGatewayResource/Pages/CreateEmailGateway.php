<?php

namespace App\Filament\Resources\EmailGatewayResource\Pages;

use App\Filament\Resources\EmailGatewayResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmailGateway extends CreateRecord
{
    protected static string $resource = EmailGatewayResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Email Gateway Created Successfully';
    }
}
