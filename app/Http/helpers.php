<?php

if (!function_exists('responsiveImage')) {
    function responsiveImage(string $img_name, string $img_alt, string $picture_class, string $img_class): string
    {
        $base_sizes = [
            1 => '320',
            2 => '640',
            3 => '1024',
        ];

        $breakpoints = [
            1 => '400px',
            2 => '834px',
            3 => '1500px',
        ];

        /* CRÉATION DU IMG_PATH */
        $img_path = asset('assets/img/640/' . $img_name);

        /* GÉNÉRER LES SIZES */
        $sizes = "(max-width: {$breakpoints[1]}) {$base_sizes[1]}px, (max-width: {$breakpoints[2]}) {$base_sizes[2]}px, {$base_sizes[3]}px";

        /* GÉNÉRER LE SRCSET */
        $srcset = '';
        foreach ($base_sizes as $base_size) {
            $srcset .= asset('assets/img/' . $base_size . '/' . $img_name . ' ' . $base_size . 'w, ');
        }

        /* RETIRER LA DERNIÈRE VIRGULE*/
        $srcset = trim($srcset, ', ');

        return <<<HTML
            <picture class="$picture_class">
            <img
            class="$img_class"
            src="$img_path"
            alt="$img_alt"
            sizes="$sizes"
            srcset="$srcset">
</picture>
HTML;

    }
}
