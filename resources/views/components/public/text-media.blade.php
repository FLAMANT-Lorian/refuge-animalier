@props([
   'title',
   'subtitle',
   'content',
   'img_path',
   'img_alt',
   'text_location'
])

<section class="py-[4.5rem] px-6 flex {!! $text_location === 'left' ? 'flex-col' : 'flex-col-reverse' !!} gap-12">
    <div class="flex flex-col gap-6">
        <div>
            <h2 class="text-2xl font-bold pb-1">
                {!! $title !!}
            </h2>
            <span class="text-xl font-semibold">
                    {!! $subtitle !!}
            </span>
        </div>
        <p class="text-base font-normal">
            {!! $content !!}
        </p>
        <x-public.link destination="/" title="Vers la page des animaux">
            Découvrir nos animaux
        </x-public.link>
    </div>
    <picture>
        <img src="{!! $img_path !!}" alt="{!! $img_alt !!}">
    </picture>
</section>
