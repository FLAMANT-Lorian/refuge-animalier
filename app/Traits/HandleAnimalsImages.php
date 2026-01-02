<?php

namespace App\Traits;

use App\Jobs\ProcessUploadImages;
use App\Livewire\Forms\AnimalEditForm;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

trait HandleAnimalsImages
{
    public function generateSizedImages($picture): string
    {
        $file_name = uniqid() . '.' . config('animals.jpg_image_type');

        $original_file = Storage::disk('s3')->putFileAs(
            config('animals.original_path'),
            $picture,
            $file_name
        );

        if ($original_file) {
            $picture = $file_name;
            ProcessUploadImages::dispatch($file_name, 'animals');
        } else {
            $picture = '';
        }

        return $picture;
    }

    public function deletePictureFromPublicStorage(int $animal_index, int $index, AnimalEditForm $form): void
    {
        $animal = Animal::findOrFail($animal_index);
        $sizes = config('animals.sizes');

        $current_file = $form->pictures[$index];

        Storage::disk('s3')->delete(config('animals.original_path') . '/' . $current_file);

        foreach ($sizes as $size) {
            $variant_path = sprintf(
                config('animals.path_to_variant'),
                $size['width'],
                $size['height']);

            Storage::disk('s3')->delete($variant_path . '/' . $current_file);
        }

        unset($form->pictures[$index]);

        if (empty($this->form->pictures)) {
            $form->pictures = null;
        }

        $animal->update(['pictures' => $form->pictures]);
    }

    public function deleteAnimalsPictures(int $id): void
    {
        $animal = Animal::findOrFail($id);
        $sizes = config('animals.sizes');

        if (empty($animal->pictures)) {
            return;
        }

        foreach ($animal->pictures as $picture) {
            Storage::disk('s3')->delete(config('animals.original_path') . '/' . $picture);

            foreach ($sizes as $size) {
                $variant_path = sprintf(
                    config('animals.path_to_variant'),
                    $size['width'],
                    $size['height']);

                Storage::disk('s3')->delete($variant_path . '/' . $picture);
            }
        }
    }
}
