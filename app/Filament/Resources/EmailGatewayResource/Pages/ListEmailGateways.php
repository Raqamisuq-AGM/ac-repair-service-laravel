<?php

namespace App\Filament\Resources\EmailGatewayResource\Pages;

use App\Filament\Resources\EmailGatewayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmailGateways extends ListRecords
{
    protected static string $resource = EmailGatewayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
