<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProcessUploadAnimalImages implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $new_original_file_name)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sizes = config('animals.sizes');
        $extension = config('animals.jpg_image_type');
        $compression = config('animals.jpg_compression');

        $image = Image::read(
            Storage::disk('public')
                ->get(config('animals.original_path') . '/' . $this->new_original_file_name)
        );

        foreach ($sizes as $size) {
            $variant = clone $image;

            $sized_image = Image::read($variant)->cover(
                $size['width'],
                $size['height']
            );

            $variant_path = sprintf(
                config('animals.path_to_variant'),
                $size['width'],
                $size['height']
            );

            $full_variant_path = $variant_path . '/' . $this->new_original_file_name;

            Storage::disk('public')->put(
                $full_variant_path,
                $sized_image->encodeByExtension($extension, $compression)
            );
        }
    }
}
