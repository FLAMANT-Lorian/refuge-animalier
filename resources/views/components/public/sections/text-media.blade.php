@props([
   'title',
   'subtitle',
   'content',
   'img_path',
   'img_alt',
   'text_location',
   'btn_label',
   'btn_title',
   'btn_destination'
])

<section class="py-[4.5rem] px-6 flex gap-12
{!! $text_location === 'left' ? 'flex-col' : 'flex-col-reverse' !!}">
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
        <x-public.button :destination="$btn_destination ?? '#'" :title="$btn_title">
            {!! $btn_label !!}
        </x-public.button>
    </div>
    <picture>
        <img src="{!! $img_path !!}" alt="{!! $img_alt !!}">
    </picture>
</section>
