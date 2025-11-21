@props([
    'data'
])

<article
    class="relative max-md:max-w-[25rem] flex h-full flex-col gap-4 p-6 border border-gray-200 bg-gray-50 rounded-2xl transition-all ease-in-out duration-200 hover:rotate-1 hover:scale-[1.02] hover:border-green-500">
    <a class="absolute z-50 top-0 left-0 bottom-0 right-0"
       title="Vers la page de {!! $data['name'] !!}"
       href="{!! route('public.animals.show', $data['id'] . '-' . $data['name']) !!}">
        <span class="sr-only">Vers la page de {!! $data['name'] !!}
        </span>
    </a>
    <div class="relative">
        <figure class="aspect-square rounded-lg overflow-hidden">
            <img class="w-full h-full" alt="Photo de {!! $data['name'] !!}" src="{!! asset($data['img_path']) !!}">
        </figure>
        <span class="shadow-(--animal-card-boxshadow) flex items-center gap-2 absolute left-4 bottom-4 px-2 py-1 rounded-2xl before:block before:content[''] before:w-[0.625rem] before:h-[0.625rem] before:rounded-full
    {!! $data['state'] === 'En cours d’adoptions' ?
'bg-green-100 before:bg-green-500' :
'bg-orange-100 before:bg-orange-500' !!}">
            {!! $data['state'] !!}
        </span>
    </div>
    <div class="flex items-center justify-between gap-4">
        <h3 class="text-lg font-medium">{!! $data['name'] !!}</h3>
        <span>{!! $data['age'] !!} ans</span>
    </div>
    <div class="flex items-center justify-between gap-4">
        <span class="font-base font-normal py-0.5 px-2 bg-green-200 rounded-2xl">{!! $data['breed'] !!}</span>
        <span>{!! $data['sex'] !!}</span>
    </div>
</article>
