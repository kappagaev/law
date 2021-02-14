<?php

namespace App\Observers;

use App\Models\AzureRegistration;

class AzureRegistrationObserver
{
    /**
     * Handle the AzureRegistration "created" event.
     *
     * @param  \App\Models\AzureRegistration  $azureRegistration
     * @return void
     */
    public function created(AzureRegistration $azureRegistration)
    {
        //
    }

    /**
     * Handle the AzureRegistration "updated" event.
     *
     * @param  \App\Models\AzureRegistration  $azureRegistration
     * @return void
     */
    public function updated(AzureRegistration $azureRegistration)
    {
        //
    }

    /**
     * Handle the AzureRegistration "deleted" event.
     *
     * @param  \App\Models\AzureRegistration  $azureRegistration
     * @return void
     */
    public function deleted(AzureRegistration $azureRegistration)
    {
        //
    }

    /**
     * Handle the AzureRegistration "restored" event.
     *
     * @param  \App\Models\AzureRegistration  $azureRegistration
     * @return void
     */
    public function restored(AzureRegistration $azureRegistration)
    {
        //
    }

    /**
     * Handle the AzureRegistration "force deleted" event.
     *
     * @param  \App\Models\AzureRegistration  $azureRegistration
     * @return void
     */
    public function forceDeleted(AzureRegistration $azureRegistration)
    {
        //
    }
}
