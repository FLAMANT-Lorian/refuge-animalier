<?php

use App\Jobs\ProcessUploadAnimalImages;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;

it('verifies if it\'s creates variants of the uploaded picture using the job', function () {
    Queue::fake();
    Storage::fake();

    $file_name = 'test.jpg';
    $original_path = config('animals.original_path');
    $sizes = config('animals.sizes');
    $path_to_variant = config('animals.path_to_variant');

    $image = File::fake()->image($file_name);

    Storage::disk('public')->putFileAs(
        $original_path,
        $image,
        $file_name
    );

    $job = new ProcessUploadAnimalImages($file_name);
    $job->handle();

    Storage::assertExists($original_path . '/' . $file_name);

    foreach ($sizes as $size) {
        $variant_path = sprintf($path_to_variant, $size['width'], $size['height']);
        Storage::assertExists($variant_path . '/' . $file_name);
    }
});
