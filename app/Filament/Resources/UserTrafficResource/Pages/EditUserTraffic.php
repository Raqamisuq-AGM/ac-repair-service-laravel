<?php

namespace App\Filament\Resources\UserTrafficResource\Pages;

use App\Filament\Resources\UserTrafficResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserTraffic extends EditRecord
{
    protected static string $resource = UserTrafficResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
