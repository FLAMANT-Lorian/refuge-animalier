@props([
    'title' => 'Titre',
    'articles' => [],
])

<section class="px-6 flex flex-col gap-8">
    <h2 class="text-2xl font-bold text-center">
        {!! $title !!}
    </h2>

    @if($articles)
        <div>
            @foreach($articles as $idx => $article)

                <article
                    class="flex flex-col border-b border-b-green-500 first-of-type:border-t first-of-type:border-t-green-500">
                    <div class="accordion_selector open py-6 px-4 flex flex-row justify-between items-center">
                        <h3 class="text-lg font-semibold pr-2">
                            {!! $article['title'] !!}
                        </h3>
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.5858 9.29282C11.3669 8.51177 12.6329 8.51177 13.4139 9.29282L17.7069 13.5858C18.0974 13.9763 18.0974 14.6093 17.7069 14.9998C17.3164 15.3903 16.6834 15.3903 16.2929 14.9998L11.9999 10.7069L7.70692 14.9998C7.31641 15.3903 6.68336 15.3903 6.29286 14.9998C5.90236 14.6093 5.90241 13.9763 6.29286 13.5858L10.5858 9.29282Z"
                                fill="#292A2B"/>
                        </svg>
                    </div>
                    <div class="accordion_content_selector">
                        <p class="font-base font-normal">
                            {!! $article['content'] !!}
                        </p>
                        <picture>
                            <img class="rounded-2xl"
                                 src="{!! $article['img_path'] !!}" alt="{!! $article['img_alt'] !!}">
                        </picture>
                    </div>
                </article>

            @endforeach
        </div>
    @endif
</section>
