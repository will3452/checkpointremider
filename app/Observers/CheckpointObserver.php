<?php

namespace App\Observers;

use App\Models\Checkpoint;

class CheckpointObserver
{
    public function creating(Checkpoint $checkpoint)
    {
        $checkpoint['user_id'] = auth()->id();
    }
}
