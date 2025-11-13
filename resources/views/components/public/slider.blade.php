@props([
    'title' => 'Titre',
    'articles' => []
])
<section>
    <h2 class="text-2xl font-bold text-center">
        {!! $title !!}
    </h2>

    @if($articles)
        <div class="slider_selector grid grid-cols-[repeat(3,327px)] gap-[6rem] px-6 overflow-x-scroll">
            @foreach($articles as $idx => $article)

                <article class="slider_item_selector pt-8 relative flex flex-col items-center">
                        <span
                            class="mb-3 shadow-(--slider-boxshadow) rounded-full flex justify-center items-center w-[50px] h-[50px] text-lg font-bold text-white bg-green-500">
                            {!! $idx + 1 !!}
                        </span>
                    <h3 class="text-center text-lg font-bold pb-2">
                        {!! $article['title'] !!}
                    </h3>
                    <p class="text-center">
                        {!! $article['content'] !!}
                    </p>
                </article>

            @endforeach
        </div>
        <div class="flex gap-4 justify-center mt-6">
            <div class="slider_btn_selector active"></div>
            <div class="slider_btn_selector"></div>
            <div class="slider_btn_selector"></div>
        </div>
    @endif
</section>
