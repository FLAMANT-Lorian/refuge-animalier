@props([
    'title' => 'Titre',
    'articles' => []
])
<section class="px-6">
    <h2 class="text-2xl font-bold text-center">
        {!! $title !!}
    </h2>

    @if($articles)
        <div class="slider_selector grid grid-cols-[repeat(3,327px)] gap-[6rem] overflow-x-scroll md:justify-center">
            @foreach($articles as $idx => $article)

                <article id="slider_{!! $idx + 1 !!}" class="slider_item_selector pt-8 lg:pt-10 relative flex flex-col items-center">
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
            <div class="slider_btn_selector active" data-target="slider_1"></div>
            <div class="slider_btn_selector" data-target="slider_2"></div>
            <div class="slider_btn_selector" data-target="slider_3"></div>
        </div>
    @endif
</section>
