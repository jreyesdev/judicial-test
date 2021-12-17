<?php

namespace App\Observers;

use App\Models\Compra;

class CompraObserver
{
    /**
     * Handle the Compra "creating" event.
     *
     * @param  \App\Models\Compra  $compra
     * @return void
     */
    public function creating(Compra $compra)
    {
        $compra->user_id = auth()->user()->id;
    }

    /**
     * Handle the Compra "created" event.
     *
     * @param  \App\Models\Compra  $compra
     * @return void
     */
    public function created(Compra $compra)
    {
        //
    }

    /**
     * Handle the Compra "updated" event.
     *
     * @param  \App\Models\Compra  $compra
     * @return void
     */
    public function updated(Compra $compra)
    {
        //
    }

    /**
     * Handle the Compra "deleted" event.
     *
     * @param  \App\Models\Compra  $compra
     * @return void
     */
    public function deleted(Compra $compra)
    {
        //
    }

    /**
     * Handle the Compra "restored" event.
     *
     * @param  \App\Models\Compra  $compra
     * @return void
     */
    public function restored(Compra $compra)
    {
        //
    }

    /**
     * Handle the Compra "force deleted" event.
     *
     * @param  \App\Models\Compra  $compra
     * @return void
     */
    public function forceDeleted(Compra $compra)
    {
        //
    }
}
