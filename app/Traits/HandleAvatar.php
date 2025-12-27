<?php

namespace App\Traits;

use App\Jobs\ProcessUploadImages;
use App\Livewire\Forms\AnimalEditForm;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

trait HandleAvatar
{
    public function generateSizedAvatar($avatar): string
    {
        $file_name = uniqid() . '.' . config('avatar.jpg_image_type');

        $original_file = Storage::disk('public')->putFileAs(
            config('avatar.original_path'),
            $avatar,
            $file_name
        );

        if ($original_file) {
            $avatar = $file_name;
            ProcessUploadImages::dispatch($file_name, 'avatar');
        } else {
            $avatar = '';
        }

        return $avatar;
    }

    public function deleteAvatar(string $file_name): void
    {
        $sizes = config('avatar.sizes');
        $original_path = config('avatar.original_path');

        foreach ($sizes as $size) {
            $variant_path = sprintf(config('avatar.path_to_variant'), $size['height'], $size['width']);

            Storage::disk('public')->delete($variant_path . '/' . $file_name);
        }

        Storage::disk('public')->delete($original_path . '/' . $file_name);

        auth()->user()->update([
            'avatar_path' => null
        ]);
    }
}
