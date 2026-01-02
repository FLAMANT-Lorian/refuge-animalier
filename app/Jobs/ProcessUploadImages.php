<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProcessUploadImages implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $new_original_file_name, public $config_path)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sizes = config($this->config_path . '.sizes');
        $extension = config($this->config_path . '.jpg_image_type');
        $compression = config($this->config_path . '.jpg_compression');

        $image = Image::read(
            Storage::disk('s3')
                ->get(config($this->config_path . '.original_path') . '/' . $this->new_original_file_name)
        );

        foreach ($sizes as $size) {
            $variant = clone $image;

            $sized_image = $variant->cover(
                $size['width'],
                $size['height']
            );

            $variant_path = sprintf(
                config($this->config_path . '.path_to_variant'),
                $size['width'],
                $size['height']
            );

            $full_variant_path = $variant_path . '/' . $this->new_original_file_name;

            Storage::disk('s3')->put(
                $full_variant_path,
                $sized_image->encodeByExtension($extension, $compression)
            );
        }
    }
}
