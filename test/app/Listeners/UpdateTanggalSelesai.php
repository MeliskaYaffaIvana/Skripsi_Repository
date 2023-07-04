<?php

namespace App\Listeners;

use App\Events\StatusJobUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTanggalSelesai implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  \App\Events\StatusJobUpdated  $event
     * @return void
     */
    public function handle(StatusJobUpdated $event)
    {
        if ($event->template->status_job == 2) {
            $event->template->tanggal_selesai = now()->toDateString();
            $event->template->save();
        }
    }
}