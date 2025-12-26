<?php

namespace App\Traits;

use App\Models\Animal;

trait RedirectToAnimalsPage
{
    public function redirectToAnimalShowPage(Animal $animal): void
    {
        $this->redirectRoute('admin.animals.show', [
            'locale' => app()->getLocale(),
            'animal' => $animal
        ],
            navigate: true);
    }

    public function redirectToAnimalIndexPage(): void
    {
        $this->redirectRoute('admin.animals.index', [
            'locale' => app()->getLocale(),
        ],
            navigate: true);
    }
}
