<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait CleanLivewireTMPFolder
{
    public function cleanLivewireTMPFolder(): void
    {
        $livewireTMPFolder = storage_path('app/public/livewire-tmp');
        if (File::exists($livewireTMPFolder)) {
            File::cleanDirectory($livewireTMPFolder);
        }
    }
}
