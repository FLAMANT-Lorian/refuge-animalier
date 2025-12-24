<?php

namespace App\Traits;

use App\Jobs\ProcessUploadAnimalImages;
use Illuminate\Support\Facades\Storage;

trait HandleImages
{
    public function generateSizedImages($picture): string
    {
        $file_name = uniqid() . '.' . config('animals.jpg_image_type');

        $original_file = Storage::disk('public')->putFileAs(
            config('animals.original_path'),
            $picture,
            $file_name
        );

        if ($original_file) {
            $picture = $file_name;
            ProcessUploadAnimalImages::dispatch($file_name);
        } else {
            $picture = '';
        }

        return $picture;
    }
}
