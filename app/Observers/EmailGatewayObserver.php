<?php

namespace App\Observers;

use App\Models\EmailGateway;
use Illuminate\Support\Facades\DB;

class EmailGatewayObserver
{
    /**
     * Handle the EmailGateway "created" event.
     */
    public function created(EmailGateway $emailGateway): void
    {
        //
    }

    /**
     * Handle the EmailGateway "updated" event.
     */
    public function updated(EmailGateway $emailGateway): void
    {
        //
    }

    /**
     * Handle the EmailGateway "deleted" event.
     */
    public function deleted(EmailGateway $emailGateway): void
    {
        //
    }

    /**
     * Handle the EmailGateway "restored" event.
     */
    public function restored(EmailGateway $emailGateway): void
    {
        //
    }

    /**
     * Handle the EmailGateway "force deleted" event.
     */
    public function forceDeleted(EmailGateway $emailGateway): void
    {
        //
    }

    public function saving(EmailGateway $emailGateway)
    {
        // Check if 'is_default' is set to 1
        if ($emailGateway->is_default == 1) {
            // Set all other records' 'is_default' to 0
            DB::transaction(function () use ($emailGateway) {
                EmailGateway::where('id', '!=', $emailGateway->id)
                    ->update(['is_default' => 0]);
            });
        }
    }
}
