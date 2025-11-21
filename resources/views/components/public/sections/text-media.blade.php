@props([
   'title',
   'subtitle',
   'content',
   'img_path',
   'img_alt',
   'text_location',
   'btn_label',
   'btn_title',
   'btn_destination',
   'animals' => false
])

<section class="py-[4.5rem] md:py-[6rem] lg:py-[11rem] px-6 md:px-12 lg:px-[12rem] flex md:grid md:grid-cols-10 gap-12 md:gap-6 lg:grid-cols-[repeat(13,minmax(0,1fr))] md:items-center
{!! $text_location === 'left' ? 'flex-col' : 'flex-col-reverse' !!}
md:{!! $text_location === 'left' ? 'flex-row' : 'flex-row-reverse' !!}">
    <div class="flex flex-col gap-6 md:col-start-1 md:col-end-6 lg:col-end-7">
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
    <picture class="{!! $animals ? 'animals' : '' !!} relative rounded-2xl md:col-start-6 lg:col-start-8 md:col-end-11 lg:col-end-[14]">
        <img class="max-h-[22.5rem] rounded-2xl w-full" src="{!! $img_path !!}"
             alt="{!! $img_alt !!}">
    </picture>
</section>
