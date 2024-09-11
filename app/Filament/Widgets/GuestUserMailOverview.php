<?php

namespace App\Filament\Widgets;

use App\Models\GuestUserMail;
use App\Models\Role;
use App\Models\UserTraffic;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GuestUserMailOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';

    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        return [
            Stat::make('Traffics', UserTraffic::query()->count()),
            Stat::make('Unread Mails', GuestUserMail::query()->where('status', 0)->count()),
            // Stat::make('User Roles', Role::query()->count()),
        ];
    }
}
