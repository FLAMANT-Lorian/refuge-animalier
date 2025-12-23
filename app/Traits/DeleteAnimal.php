<?php

namespace App\Traits;

use App\Models\Animal;

trait DeleteAnimal
{
    public function deleteAnimal(int $id): void
    {
        $animal = Animal::findOrFail($id);

        $animal->delete();

        session()->flash('status', __('admin/animals.delete_flash_message'));
    }
}
